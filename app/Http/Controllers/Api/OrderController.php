<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResorce;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function TodayOrder(){

        $order = OrderResorce::collection(Order::all());
        return response()->json($order, 200);



       }
}
