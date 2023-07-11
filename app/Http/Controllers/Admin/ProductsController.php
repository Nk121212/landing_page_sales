<?php

namespace App\Http\Controllers\Admin;

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
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.products');
    }

    public function datatable(Request $request){
        if ($request->ajax()) {
            $data = Products::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button onclick="getProfile(`'.$row->id.'`, `'.route('admin.products.profile').'`, `'.route('admin.products.update').'`)" class="edit btn btn-success btn-sm">Edit</button> 
                    <button onclick="showDeleteModal(`'.$row->id.'`, `'.route('admin.products.delete').'`)" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(Request $request){

        // dd($request->all());
        if(isset($request->photo)){

            $this->validate($request,[
                'name' => 'required',
                'price' => 'required',
                'embed' => 'required|url',
                'categories_id' => 'required|numeric',
                'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);
    
            $upload = uploadPhoto($request);

        }

        $action = Products::create([
            'name' => $request->name,
            'price' => str_replace(',', '', $request->price),
            'embed' => $request->embed,
            'categories_id' => $request->categories_id,
            'description' => $request->description,
            'photo' => isset($upload) ? $upload : ''
        ]);

        return response()->json(['message' => 'success insert data'], 201);
    }

    public function profile(Request $request){
        // dd($request->all());
        $eloq = Products::find($request->id);
        
        return response()->json(['message' => 'success', 'data' => $eloq], 200);
    }

    public function update(Request $request){

        // dd($request->all());
        if(isset($request->photo)){

            $this->validate($request,[
                'name' => 'required',
                'price' => 'required',
                'embed' => 'required|url',
                'categories_id' => 'required|numeric',
                'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);
    
            $upload = uploadPhoto($request);

        }

        if(isset($upload)){
            $arrPhoto = ['photo' => $upload];
        }else{
            $arrPhoto = [];
        }

        $body = array_merge(
            $arrPhoto,
            [
                'name' => $request->name,
                'price' => str_replace(',', '', $request->price),
                'embed' => $request->embed,
                'categories_id' => $request->categories_id,
                'description' => $request->description
            ]
        );

        try
        {
            $action = Products::where('id', $request->id)->update($body);
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
        $delete = Products::where('id', $request->id)->delete();

        return response()->json(['message' => 'success delete data'], 200);
    }


}
