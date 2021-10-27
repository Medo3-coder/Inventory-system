<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expense\StoreRequest;
use App\Models\Expanse;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ExpanseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expanse = Expanse::all();
        return response()->json($expanse);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // $validateData = $request->validate([
        //     'details' => 'required',
        //     'amount' => 'required',
        //    ]);

        //     $expense = new Expanse;
        //     $expense->details = $request->details;
        //     $expense->amount = $request->amount;
        //     $expense->expense_date = date('d/m/y');

        //     $expense->save();


         $validatedData = $request->validated();
         $validatedData['expense_date'] = Carbon::now()->format('Y-m-d');
         $expanse = Expanse::create( $validatedData );



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showExpense = Expanse::findOrFail($id);
        return response()->json($showExpense);
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

         $data = array();
         $data['details'] = $request->details;
         $data['amount'] = $request->amount;
         $updateExpense =  Expanse::find($id)->update($data);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $expense = Expanse::find($id)->delete();
    }
}
