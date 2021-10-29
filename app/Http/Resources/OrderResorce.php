<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResorce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

       // $data =  parent::toArray($request);
        return[
            'customer_id' => $this->customer_id,
            'due' => $this->due,
            'id' => $this->id,
            'name' => $this->customer->name,
            'order_date' => $this->order_date,
            'order_month' => $this->order_month,
            'order_year' => $this->order_year,
            'pay' => $this->pay,
            'qty' => $this->qty,
            'sub_total' => $this->sub_total,
            'total' => $this->total,
            'vat' => $this->qty,
            'payby' => $this->payby,


        ];


    }
}
