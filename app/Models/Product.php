<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_name',
        'product_code',
        'root',
        'buying_price',
        'selling_price',
        'supplier_id',
        'buying_date',
        'image',
        'product_quantity',



    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }



    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }

    // public function supplier(){
    //     return $this->belongsTo(Supplier::class);
    //}



    // make resource instad of join

    // public function getAllProduct()
    // {
    //   return   $product = DB::table('products')
    //     ->join('categories','products.category_id','categories.id')
    //     ->join('suppliers','products.supplier_id','suppliers.id')
    //     ->select('categories.category_name','suppliers.name','products.*')
    //     ->orderBy('products.id','DESC')
    //     ->get();
    // }
}
