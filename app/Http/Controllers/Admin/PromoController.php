<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Promo;
use Yajra\DataTables\Datatables;
Use Exception;

class PromoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // dd(getCategori());
        $arrParam = [
            'createUrl' => route('admin.promo.create'),
            'updateUrl' => route('admin.promo.update')
        ];

        return view('admin.promo')->with(['action' => $arrParam]);
    }

    public function datatable(Request $request){
        if ($request->ajax()) {
            $data = Promo::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button onclick="getProfile(`'.$row->id.'`, `'.route('admin.promo.profile').'`, `'.route('admin.promo.update').'`)" class="edit btn btn-success btn-sm">Edit</button> 
                    <button onclick="showDeleteModal(`'.$row->id.'`, `'.route('admin.promo.delete').'`)" class="delete btn btn-danger btn-sm">Delete</button>';
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
                // 'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'description' => 'required',
            ]);
    
            // $upload = uploadPhoto($request);

        }

        $action = Promo::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => '-'
        ]);

        $upload = uploadPhoto($request);

        $body = [
            'photo' => $upload['image']
        ];

        $update = Promo::where('id', $action->id)->update($body);

        return response()->json(['message' => 'success insert data'], 201);
    }

    public function profile(Request $request){
        // dd($request->all());
        $eloq = Promo::find($request->id);
        
        return response()->json(['message' => 'success', 'data' => $eloq], 200);
    }

    public function update(Request $request){

        // dd($request->all());
        if(isset($request->photo)){

            $this->validate($request,[
                'name' => 'required',
                'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'description' => 'required',
            ]);
    
            $upload = uploadPhoto($request);

        }

        if(isset($upload)){
            $arrPhoto = ['photo' => $upload['image']];
        }else{
            $arrPhoto = [];
        }

        $body = array_merge(
            $arrPhoto,
            [
                'name' => $request->name,
                'description' => $request->description
            ]
        );

        try
        {
            $action = Promo::where('id', $request->id)->update($body);
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
        $delete = Promo::where('id', $request->id)->delete();

        return response()->json(['message' => 'success delete data'], 200);
    }
}
