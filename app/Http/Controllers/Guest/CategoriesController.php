<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categories;
use Yajra\DataTables\Datatables;
Use Exception;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        // dd(getCategori());
        return view('guest.categories');
    }


}
