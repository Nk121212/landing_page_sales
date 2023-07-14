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
        $this->middleware('auth');
    }

    public function index(){
        // dd(getCategori());
        $arrParam = [
            'createUrl' => route('admin.categories.create'),
            'updateUrl' => route('admin.categories.update')
        ];

        return view('admin.categories')->with(['action' => $arrParam]);
    }

    public function datatable(Request $request){
        if ($request->ajax()) {
            $data = Categories::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button onclick="getProfile(`'.$row->id.'`, `'.route('admin.categories.profile').'`, `'.route('admin.categories.update').'`)" class="edit btn btn-success btn-sm">Edit</button> 
                    <button onclick="showDeleteModal(`'.$row->id.'`, `'.route('admin.categories.delete').'`)" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(Request $request){

        $this->validate($request,[
            'name' => 'required'
        ]);

        $action = Categories::create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'success insert data'], 201);
    }

    public function profile(Request $request){
        // dd($request->all());
        $eloq = Categories::find($request->id);
        
        return response()->json(['message' => 'success', 'data' => $eloq], 200);
    }

    public function update(Request $request){

        $this->validate($request,[
            'name' => 'required'
        ]);

        $body = ['name' => $request->name];

        try
        {
            $action = Categories::where('id', $request->id)->update($body);
            return response()->json(['message' => 'success update data'], 200);
        }
        catch(Exception $e)
        {
            // dd($e->getMessage());
            return response()->json(['message' => 'failed update data', 'real_message' => $e->getMessage()], 500);
        }
    }

    public function delete(Request $request){
        // dd($request->all());
        $delete = Categories::where('id', $request->id)->delete();

        return response()->json(['message' => 'success delete data'], 200);
    }


}
