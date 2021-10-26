<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart($id)
    {
        //insert data from products to pos table
         $product = DB::table('products')->where('id',$id)->first();

         $data = array();
         $data['pro_id'] = $id;
         $data['pro_name'] = $product->product_name;
         $data['pro_quantity'] = 1;
         $data['product_price'] = $product->selling_price;
         $data['sub_total'] = $product->selling_price;

         DB::table('pos')->insert($data);

    }
}
