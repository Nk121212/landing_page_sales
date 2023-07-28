<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Testimoni;
use App\Models\Promo;
use App\Models\News;
use App\Models\Simulasi;
use App\Models\DetailProducts;
use App\Models\User;
use App\Models\Type;

if(!function_exists('getProducts')){

    function getProducts(){
        $data = Products::all();
        return $data;
    }

}

if(!function_exists('getProductsGroupByType')){

    function getProductsGroupByType(){
        $data = Products::select("*")
        ->orderBy('price', 'asc')
        ->get()
        ->unique('id_type');

        return $data;
    }

}

if(!function_exists('getProductTerkait')){

    function getProductTerkait($id){

        $getFirst = Products::where('id', $id)->first();
        $id_type = $getFirst->id_type;

        $data = Products::where('id_type', $id_type)
        ->where('id', '!=', $id)
        ->get();

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

if(!function_exists('getNews')){

    function getNews($limit=""){

        if($limit == ""){
            $data = News::all();
        }else{
            $data = News::orderBy('updated_at', 'desc')->paginate($limit);
        }
        
        return $data;
    }

}

if(!function_exists('getSimulasi')){

    function getSimulasi(){
        $data = Simulasi::all();
        return $data;
    }

}

if(!function_exists('getNewsLatest')){

    function getNewsLatest(){
        $data = News::orderBy('news_date', 'desc')->first();
        return $data;
    }

}

if(!function_exists('getProductsDetail')){

    function getProductsDetail($id_products){
        $data = DetailProducts::where('id_products', $id_products)->get();
        return $data;
    }

}

if(!function_exists('getMasterType')){

    function getMasterType(){
        $data = Type::all();
        return $data;
    }

}

if(!function_exists('getUsersActive')){

    function getUsersActive(){
        $data = User::where('status', '1')->first();
        return $data;
    }

}



if(!function_exists('uploadFile')){

    function uploadPhoto(Request $request){

        $explode = explode(".", Route::currentRouteName());
        $prefix_file_name = $explode[1];

        $imageName = '';
        $brosurName = '';
        if(isset($request->name)){
            $fileNameTrim = $request->name;
        }elseif(isset($request->judul)){
            $fileNameTrim = $request->judul;
        }else{
            $fileNameTrim = time();
        }

        $name = str_replace(' ', '_', $fileNameTrim);

        if(isset($request->photo)){
            $imageName = strtolower($prefix_file_name.'_'.$name.'.'.$request->photo->getClientOriginalExtension());
            $request->photo->move(storage_path('/app/public/uploads'), $imageName);
        }

        if(isset($request->brosur)){
            $brosurName = strtolower($prefix_file_name.'_brosur_'.$name.'.'.$request->brosur->getClientOriginalExtension());
            $request->brosur->move(storage_path('/app/public/uploads'), $brosurName);
        }

        $detailUpload = [];
        if(isset($request->uploadDetail)){
            $i=0;
            foreach ($request->uploadDetail as $file) {
                $fileName = strtolower(time().$i.'.'.$file->getClientOriginalExtension());
                $file->move(storage_path('/app/public/uploads'), $fileName);
                $detailUpload[$i] = $fileName;
                $i++;
            }
        }

        return ['image' => $imageName, 'brosur' => $brosurName, 'detail_products' => $detailUpload];

    }

}

if(!function_exists('rupiah')){

    function rupiah($angka){
 
		$data = "Rp " . number_format($angka,0,',','.');

	    return $data;

    }

}

?>