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
        $employee = (new Employee)->getEmployee();
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
            $validateData['photo'] =  FileService::uploadBase64Image($request->photo);
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
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            Employee::find($id)->delete();
        }
        else
        {
            Employee::find($id)->delete();
        }

    }
}
