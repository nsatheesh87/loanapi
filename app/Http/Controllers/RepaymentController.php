<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Loan;
use App\Repayment;

/**
 * Class RepaymentController
 * @package App\Http\Controllers
 */
class RepaymentController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $params = $request->json()->all();

        // do the validation before send it to model
        $validator = \Validator::make($params, [
            'loanId'            => 'required',
            'amount'                 => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $loan = Loan::find($params['loanId']);

        $validateRequest = $this->validateRepaymentrequest($loan, $params);

        if($validateRequest == 'valid') {
            $repayment = Repayment::create($params);
            $this->updateLoanStatus($loan);
            return response()->json($repayment);
        }
        return response()->json($validateRequest);

    }

    /**
     * @param Loan $loan
     * @return bool
     */
    protected function updateLoanStatus(Loan $loan)
    {
        $repayments = Repayment::where('loanId','=', $loan->id)->count();
        $totalTransactions = $loan->duration/$loan->repayment_frequency;

        if($repayments == $totalTransactions) {
            $loan->status = 'completed';
            $loan->save();
        }

        return true;
    }

    /**
     * @param Loan $loan
     * @param $params
     * @return string
     */
    protected function validateRepaymentrequest(Loan $loan, $params)
    {

        if (!$loan || $loan->status == 'completed') {
            return 'Loan does not exist or closed';
        }

        if($loan->install_amount == $params['amount']) {
            return 'valid';
        }

        return 'Invalid installment amount. Expected Amount for your loan is : '.$loan->install_amount;

    }
}
