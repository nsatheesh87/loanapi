<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Customer::all());
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
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email|unique:customers'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $customer = Customer::create($params);

        return response()->json($customer);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json( Customer::find($id) );
    }
}
