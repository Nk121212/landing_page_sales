<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use Yajra\DataTables\Datatables;
Use Exception;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('guest.products');
    }

    public function detail(Request $request){
        // dd($request->all());
        $id = base64_decode($request->param);

        $eloq = Products::find($id);

        return view('guest.products_detail')->with(['data' => $eloq]);
    }


}
