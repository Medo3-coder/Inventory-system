<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =

    [
        'customer_id' ,
        'due',
        'id',
        'name',
        'order_date',
        'order_month',
        'order_year',
        'pay',
        'qty',
        'sub_total',
        'total',
        'vat',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
