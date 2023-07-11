<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;

if(!function_exists('getProducts')){

    function getProducts(){
        $list_products = Products::all();
        return $list_products;
    }

}

if(!function_exists('getCategori')){

    function getCategori(){
        $list_categories = Categories::all();
        return $list_categories;
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