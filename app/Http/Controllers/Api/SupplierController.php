<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Suppliers\SupplierStroreRequest;
use App\Models\Supplier;
use App\Services\FileService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::orderBy('created_at', 'desc')->get();
        return response()->json($supplier);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierStroreRequest $request)
    {
        $supplierData = $request->validated();
        if($request->photo)
        {
            $supplierData['photo'] = FileService::uploadBase64ImageForSupplier($request->photo);
        }
        $supplier = Supplier::create($supplierData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showSupplier = Supplier::findOrFail($id);
        return response()->json($showSupplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierStroreRequest $request, $id)
    {
        $UpdateSupplier =  $request->validated();
        $image = $request->newphoto ;
        $supplier = Supplier::find($id);

        if($image)
        {
            $UpdateSupplier['photo'] = FileService::uploadBase64ImageForSupplier($image);
            $photo = $supplier->photo ;
            unlink($photo);
            $supplier->update($UpdateSupplier);
        }

        $supplier->update($UpdateSupplier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suppliers = Supplier::find($id);
        $photo = $suppliers->photo;
        if($photo)
        {
            unlink($photo);
            $suppliers->delete();
        }
        else
        {
            $suppliers->delete();
        }


    }
}
