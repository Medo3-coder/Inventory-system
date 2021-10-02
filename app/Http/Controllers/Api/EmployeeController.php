<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

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
    public function store(Request $request)
    {
/*
        $validateData = $request->validated();
        Employee::create($validateData);

        //image/jpeg;base64
        if($request->hasFile('photo')){
            $postion = strpos($request->photo , ";");
            $substr = substr($request->photo , 0 , $postion);
            $exist = explode('/' , $substr)[1];  // image.png

            $name = time().".".$exist;
            $img = Image::make($request->photo)->resize(240 , 200);
            $upload_path = 'backend/employee/';
            $image_url = $upload_path.$name ;
            $img->save($image_url);

           $validateData['photo'] = $request->$image_url;
           Employee::create($validateData);


        }
        */





        $validateData = $request->validate([
            'name' => 'required|unique:employees|max:255',
            'email' => 'required',
            'phone' => 'required|unique:employees',
            'sallery' => 'required',

           ]);



           $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'sallery' => $request->sallery,
            'address' => $request->address,
            'nid' => $request->nid,
            'joining_date' => $request->joining_date,
           ]);




         if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'backend/employee/';
            $image_url = $upload_path.$name;
            $img->save($image_url);

            $employee->update([
                'photo' => $image_url,
            ]);

        }



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
        //
    }
}
