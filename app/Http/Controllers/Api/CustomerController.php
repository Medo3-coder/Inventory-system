<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Models\Customer;
use App\Models\Employee;
use App\Services\FileService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customer = Customer::orderBy('created_at', 'desc')->get();
       return response()->json($customer);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $ValidatedDate = $request->validated();
        if($request->photo)
        {
            $ValidatedDate['photo']= FileService::uploadBase64ImageForCustomer($request->photo);

        }
        $customer = Customer::create($ValidatedDate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $updateCustomer = $request->validated();
        $photo = $request->newphoto;
        $customer = Customer::find($id);
        if($photo)
        {
            $updateCustomer['photo'] = FileService::uploadBase64ImageForCustomer($photo);
            $img = $customer->photo ;
            unlink($img);
            $customer->update($updateCustomer);
        }

        $customer->update($updateCustomer);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $img = $customer->photo;
        if($img)
        {
            unlink($img);
            $customer->delete();
        }
        else
        {
            $customer->delete();
        }
    }
}
