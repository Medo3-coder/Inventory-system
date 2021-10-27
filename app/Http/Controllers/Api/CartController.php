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

         $check = DB::table('pos')->where('pro_id',$id)->first();
         if($check)
         {
            DB::table('pos')->where('pro_id',$id)->increment('pro_quantity');  // to increment the qunatity
            //to incement product when click on photo
            $productIncrement = DB::table('pos')->where('pro_id',$id)->first();
            $subtotal = $productIncrement->pro_quantity  *  $productIncrement->product_price;
            DB::table('pos')->where('pro_id',$id)->update(['sub_total'=>$subtotal]);
         }
         else
         {
            $data = array();
            $data['pro_id'] = $id;
            $data['pro_name'] = $product->product_name;
            $data['pro_quantity'] = 1;
            $data['product_price'] = $product->selling_price;
            $data['sub_total'] = $product->selling_price;

            DB::table('pos')->insert($data);
         }



    }

    public function cartProduct()
    {
        //get all data from pos table

        $cart = DB::table('pos')->get();
        return response()->json($cart);
    }


    public function removeCart($id)
    {
        DB::table('pos')->where('id',$id)->delete();
        return response('done');
    }


    public function increment($id)
    {
        // requested id is cart id to increment by button
        $quantity = DB::table('pos')->where('id',$id)->increment('pro_quantity');

        $product = DB::table('pos')->where('id',$id)->first();
          // unit * price = subtotal
        $subtotal = $product->pro_quantity  *  $product->product_price;
        //update total subtotal
        DB::table('pos')->where('id',$id)->update(['sub_total'=>$subtotal]);
        return response('done');
    }


    public function decrement($id)
    {
         // requested id is cart id to increment by button
        $quantity = DB::table('pos')->where('id',$id)->decrement('pro_quantity');

        $product = DB::table('pos')->where('id',$id)->first();
        // unit * price = subtotal
        $subtotal = $product->pro_quantity  *  $product->product_price;
          //update total subtotal
        DB::table('pos')->where('id',$id)->update(['sub_total'=>$subtotal]);
        return response('done');
    }
}
