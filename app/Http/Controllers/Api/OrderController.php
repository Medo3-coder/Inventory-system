<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AllOrderDetailsResource;
use App\Http\Resources\OrderDetailsResource;
use App\Http\Resources\OrderResorce;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function TodayOrder(){

        $order = OrderResorce::collection(Order::all());
        return response()->json($order, 200);

       }



       public function OrderDetails($id)
       {
        //     $orderDetails = OrderDetailsResource::collection(Order::where('id', $id)->get());

        //    // dd($orderDetails);
        //      return response()->json($orderDetails);

                    $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->where('orders.id',$id)
                ->select('customers.name','customers.phone','customers.address','orders.*')
                ->first();
                 // dd( $order );
               return response()->json($order);
       }


       public function OrderDetailsAll($id)
       {
        $details = DB::table('order_details')
        ->join('products','order_details.product_id','products.id')
        ->where('order_details.order_id',$id)
        ->select('products.product_name','products.product_code','products.image','order_details.*')
        ->get();
        return response()->json($details);




        //    $OrderDetailsAll = AllOrderDetailsResource::collection(OrderDetails::where('order_id', $id)->get());
        //    dd($OrderDetailsAll );
        //    //return response()->json($OrderDetailsAll);
       }
}
