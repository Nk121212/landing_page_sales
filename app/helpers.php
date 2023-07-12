<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Testimoni;

if(!function_exists('getProducts')){

    function getProducts(){
        $data = Products::all();
        return $data;
    }

}

if(!function_exists('getCategori')){

    function getCategori(){
        $data = Categories::all();
        return $data;
    }

}

if(!function_exists('getTestimoni')){

    function getTestimoni(){
        $data = Testimoni::all();
        return $data;
    }

}

if(!function_exists('uploadFile')){

    function uploadPhoto(Request $request){
 
		$imageName = time().'.'.$request->photo->getClientOriginalExtension();
        $upload = $request->photo->move(public_path('/uploads'), $imageName);

        return $imageName;

    }

}

?>