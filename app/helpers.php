<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

if(!function_exists('getCategori')){
    function getCategori(){
        return 'test';
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