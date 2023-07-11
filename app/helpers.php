<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

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