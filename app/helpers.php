<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Testimoni;
use App\Models\Promo;

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

if(!function_exists('getPromo')){

    function getPromo(){
        $data = Promo::all();
        return $data;
    }

}


if(!function_exists('uploadFile')){

    function uploadPhoto(Request $request){

        // dd(Route::currentRouteName());

        // dd();

        $explode = explode(".", Route::currentRouteName());
        $prefix_file_name = $explode[1];

        // dd($request);
        $imageName = '';
        $brosurName = '';
        $fileNameTrim = (isset($request->name)) ? $request->name : $request->judul;
        if(isset($request->photo)){
            $imageName = $prefix_file_name.'_'.trim($fileNameTrim, " ").'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/uploads'), $imageName);
        }

        if(isset($request->brosur)){
            $brosurName = $prefix_file_name.'_brosur_'.trim($fileNameTrim, " ").'.'.$request->brosur->getClientOriginalExtension();
            $request->brosur->move(public_path('/uploads'), $brosurName);
        }

        return ['image' => $imageName, 'brosur' => $brosurName];

    }

}

if(!function_exists('rupiah')){

    function rupiah($angka){
 
		$data = "Rp " . number_format($angka,0,',','.');

	    return $data;

    }

}

?>