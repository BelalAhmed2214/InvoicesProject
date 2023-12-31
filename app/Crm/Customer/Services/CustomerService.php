<?php

namespace Crm\Customer\Services;

use Crm\Customer\Models\Customer;
use Crm\Customer\Requests\CreateCustomerRequest;
use Crm\Project\Events\CustomerCreation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerService
{
    public function index(Request $request)
    {
        return Customer::all();

    }

    public function show($id)
    {
        return Customer::find($id)??response()->json(['status'=>'Not Found'],Response::HTTP_NOT_FOUND);
    }

    public function create(CreateCustomerRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->get('name');
        $customer->save();
        event(new CustomerCreation($customer));
        return $customer;
    }
    public function update(Request $request,$id)
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['status'=>'Not Found'],Response::HTTP_NOT_FOUND);
        }
        $customer->name = $request->get('name');
        $customer->save();
        return $customer;
    }
    public function delete(Request $request,int $id)
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['status'=>'Not Found'],Response::HTTP_NOT_FOUND);
        }
        $customer->delete();
        return response()->json(['status'=>'deleted'],Response::HTTP_OK);
        ;
    }

}
