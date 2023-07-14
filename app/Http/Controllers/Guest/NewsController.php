<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use Yajra\DataTables\Datatables;
Use Exception;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        // dd(getCategori());
        return view('guest.news');
    }
}
