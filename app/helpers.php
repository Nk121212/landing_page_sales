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

if(!function_exists('uploadProduct')){

    function uploadProduct(Request $request, $id){

        $imageName = "";
        $status = false;
        $name_key = "";
        if(isset($request->photo)){

            $name_key = 'product_'. base64_encode($id);
            $imageName = $name_key.'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(storage_path('/app/public/uploads'), $imageName);

            $status = true;

        }

        return ['image' => $imageName, 'product_image_name' => $name_key, 'status' => $status];

    }

}

if(!function_exists('uploadBrosur')){

    function uploadBrosur(Request $request, $id){

        $brosurName = "";
        $status = false;
        if(isset($request->brosur)){
            $name_key = 'brosur_'. base64_encode($id);
            $brosurName = $name_key.'.'.$request->brosur->getClientOriginalExtension();
            $request->brosur->move(storage_path('/app/public/uploads'), $brosurName);

            $status = true;
        }

        return ['brosur' => $brosurName, 'status' => $status];

    }

}

if(!function_exists('uploadDetails')){

    function uploadDetails(Request $request, $product_image_name){

        $detailUpload = [];
        if(isset($request->uploadDetail)){
            $i=0;
            foreach ($request->uploadDetail as $file) {
                $name_key = 'detail_product_'.$product_image_name.'_'.$i;
                $fileName = strtolower($name_key.'.'.$file->getClientOriginalExtension());
                $file->move(storage_path('/app/public/uploads'), $fileName);
                $detailUpload[$i] = $fileName;
                $i++;
            }
        }

        return ['detail_products' => $detailUpload];

    }

}

if(!function_exists('uploadPhoto')){

    function uploadPhoto(Request $request, $id=""){

        $explode = explode(".", Route::currentRouteName());
        $prefix_file_name = $explode[1];

        $name_key = (isset($request->id)) ? base64_encode($request->id) : base64_encode($id);
        $imageName = $prefix_file_name.'_'.$name_key.'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(storage_path('/app/public/uploads'), $imageName);

        return ['image' => $imageName];

    }

}

if(!function_exists('rupiah')){

    function rupiah($angka){
 
		$data = "Rp " . number_format($angka,0,',','.');

	    return $data;

    }

}

?>