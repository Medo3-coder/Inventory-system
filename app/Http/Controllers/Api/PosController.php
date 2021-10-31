<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResorce;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

class PosController extends Controller
{
    public function getProduct($id)
    {
        $getProduct = DB::table('products')->where('category_id',$id)
        ->get();
        return response()->json($getProduct);
    }


    public function OrderDone(Request $request){

   	 $validatedData = $request->validate([
      'customer_id' => 'required',
      'payby' => 'required',
   	 ]);

    $data = array();
    $data['customer_id'] = $request->customer_id;
    $data['qty'] = $request->qty;
    $data['sub_total'] = $request->subtotal;
    $data['vat'] = $request->vat;
    $data['total'] = $request->total;
    $data['pay'] = $request->pay;
    $data['due'] = $request->due;
    $data['payby'] = $request->payby;
    $data['order_date'] = date('d/m/y');
    $data['order_month'] = date('F');
    $data['order_year'] = date('Y');
    $order_id = DB::table('orders')->insertGetId($data);

    $contents = DB::table('pos')->get();

    $odata = array();
    foreach ($contents as $content) {
    $odata['order_id'] = $order_id;
    $odata['product_id'] = $content->pro_id;
    $odata['pro_quantity'] = $content->pro_quantity;
    $odata['product_price'] = $content->product_price;
    $odata['sub_total'] = $content->sub_total;
    DB::table('order_details')->insert($odata);

   // to update data in stock
     DB::table('products')->where('id',$content->pro_id)
     ->update(['product_quantity' =>DB::raw('product_quantity -' . $content->pro_quantity)]);


    }
    DB::table('pos')->delete();
    return response('done');


   }


   public function SearchOrderDate(Request $request)
   {
       $orderdate = $request->date;
       $newDate = new DateTime($orderdate);
       $changedFormatDate = $newDate->format('d/m/y') ;

      $order = OrderResorce::collection(Order::where('order_date',$changedFormatDate)->get());



    //    $order = DB::table('orders')
    //    ->join('customers','orders.customer_id','customers.id')
    //    ->select('customers.name','orders.*')
    //    ->where('orders.order_date',$changedFormatDate)->get();
    //    //dd($order);

      return response()->json($order);
   }


   public function TodaySell()
   {
       $date = date('d/m/y');
       $sell = DB::table('orders')->where('order_date',$date)->sum('total');
       return response()->json($sell);
   }


   public function TodayIncome()
   {
        $date = date('d/m/y');
        $icome = DB::table('orders')->where('order_date',$date)->sum('pay');
        return response()->json($icome);
   }

   public function TodayDue()
   {
        $date = date('d/m/y');
        $due = DB::table('orders')->where('order_date',$date)->sum('due');
        return response()->json($due);
   }


   public function TodayExpense()
   {
    $date = Carbon::now()->format('Y-m-d');
    $expense = DB::table('expanses')->where('expense_date',$date)->sum('amount');
    return response()->json($expense);
   }

   public function Stockout()
   {
       //$product = DB::table('products')->where('product_quantity' , '<' , '1')->get();

       $product = ProductResource::collection(Product::where('product_quantity' , '<' , '1')->get());
       return response()->json($product);
   }
}
