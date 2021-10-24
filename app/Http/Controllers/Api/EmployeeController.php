<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

use App\Services\FileService;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::orderBy('created_at', 'desc')->get();
        return response()->json($employee);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validateData = $request->validated();

        if($request->photo){
            $validateData['photo'] =  FileService::uploadBase64ImageforEmployee($request->photo);
        }

        $employee = Employee::create($validateData);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
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
         $updateEmployee = $request->validated();

         $img = $request->newphoto;
         $employee = Employee::find($id);

         if($img)
         {
            $updateEmployee['photo'] = FileService::uploadBase64ImageforEmployee($img);
            $photo =  $employee->photo;
            unlink($photo);
            $employee->update($updateEmployee);

         }

         $employee->update($updateEmployee);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $photo =  $employee->photo;
        if($photo)
        {
            unlink($photo);
            $employee->delete();

        }
        else
        {
            $employee->delete();

        }

    }
}
