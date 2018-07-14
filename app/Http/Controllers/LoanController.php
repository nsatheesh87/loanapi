<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use App\Loan;

/**
 * Class LoanController
 * @package App\Http\Controllers
 */
class LoanController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Loan::all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $params = $request->json()->all();

        // do the validation before send it to model
        $validator = \Validator::make($params, [
            'customerId'            => 'required',
            'title'                 => 'required',
            'duration'              => 'required|integer',
            'amount'                => 'required|numeric',
            'repayment_frequency'   => 'required|integer',
            'interest_rate'         => 'required|integer',
            'arrangement_fee'       => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        if(!Customer::find($params['customerId'])) {
            return response()->json('Invalid customer');
        }
        $params['install_amount'] = $this->getInstallmentAmount($params);
        $customer = Loan::create($params);

        return response()->json($customer);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json( Loan::find($id) );
    }

    /**
     * @param $params
     * @return float
     */
    private function getInstallmentAmount($params)
    {
        extract($params,EXTR_PREFIX_SAME, "wddx");
        $period     = $duration/$repayment_frequency;
        $totalAmount    = ($amount+($amount*($interest_rate/100)));
        return round(($totalAmount+$arrangement_fee)/$period,2);
    }
}
