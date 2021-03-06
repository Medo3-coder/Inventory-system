<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $product = (new Product)->getAllProduct();
         $product = ProductResource::collection(Product::all());   // all item
        //  $product = ProductResource::make(Product::first());   // one item
        return response()->json($product);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request )
    {
          $VaildatedData = $request->validated();


          if($request->image)
          {
              $VaildatedData['image'] = FileService::uploadBase64ImageForProduct($request->image);
          }

         //dd($VaildatedData);
          $product = Product::create($VaildatedData);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $updateproduct = $request->validated();

        $img = $request->newimage;
        $product = Product::find($id);

        if($img)
        {
            $updateproduct['image'] = FileService::uploadBase64ImageForProduct($img);
           $photo =  $product->image;
           unlink($photo);
           $product->update($updateproduct);

        }

        $product->update($updateproduct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image = $product->image ;
        if($image)
        {
            unlink($image);
            $product->delete();
        }

        $product->delete();

    }


    public function stockUpdate(Request $request , $id)
    {
        // to update one field
        $data = array();
        $data ['product_quantity'] = $request->product_quantity;
        $product = Product::find($id)->update($data);
    }
}
