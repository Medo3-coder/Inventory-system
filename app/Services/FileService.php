<?php

namespace App\Services;

use Image;

class FileService{

//image/jpeg;base64
    public static function uploadBase64ImageforEmployee($image){
        $postion = strpos($image , ";");
        $substr = substr($image , 0 , $postion);
        $exist = explode('/' , $substr)[1];  // image.png

        $name = time().".".$exist;
        $img = Image::make($image)->resize(240 , 200);
        $upload_path = 'backend/employee/';
        $image_url = $upload_path.$name ;
        $img->save($image_url);

        return $image_url;
    }




    public static function uploadBase64ImageForSupplier($image){
        $postion = strpos($image , ";");
        $substr = substr($image , 0 , $postion);
        $exist = explode('/' , $substr)[1];  // image.png

        $name = time().".".$exist;
        $img = Image::make($image)->resize(240 , 200);
        $upload_path = 'backend/supplier/';
        $image_url = $upload_path.$name ;
        $img->save($image_url);

        return $image_url;
    }







}
