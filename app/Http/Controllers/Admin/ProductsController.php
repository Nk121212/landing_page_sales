<?php

namespace App\Http\Controllers\Admin;
use App\Models\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.products');
    }

    public function create(Request $request){
        dd($request->all());
        $action = Products::create($request->all());
    }
}
