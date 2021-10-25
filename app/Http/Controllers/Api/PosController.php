<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function getProduct($id)
    {
        $getProduct = DB::table('products')->where('category_id',$id)
        ->get();
        return response()->json($getProduct);
    }
}
