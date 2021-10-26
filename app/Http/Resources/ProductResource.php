<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {


         // to return default data and i can add more data
        $data =  parent::toArray($request);

        $data['category_name'] =  $this->category->category_name;

        return $data;

        /*
           // to return all data and i can add more data
         'buying_date' => $this->buying_date,
        'buying_price' => $this->buying_price ,
        'category_id' => $this->category_id,
        'category_name' => $this->category->category_name,
        'created_at' => $this->created_at,
        'id' => $this->id,
        'image' => $this->image,
        'name' => $this->name,
        'product_code' => $this->product_code,
        'product_name' => $this->product_name,
        'product_quantity' => $this->product_quantity,
        'root' => $this->root,
        'selling_price' => $this->selling_price,
        'supplier_id' => $this->supplier_id,
        'updated_at' => $this->updated_at,

        */

    }
}
