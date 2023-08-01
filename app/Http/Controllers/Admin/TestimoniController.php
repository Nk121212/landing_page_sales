<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Testimoni;
use Yajra\DataTables\Datatables;
Use Exception;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $arrParam = [
            'createUrl' => route('admin.testimoni.create'),
            'updateUrl' => route('admin.testimoni.update')
        ];

        return view('admin.testimoni')->with(['action' => $arrParam]);
    }

    public function datatable(Request $request){
        if ($request->ajax()) {
            $data = Testimoni::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button onclick="getProfile(`'.$row->id.'`, `'.route('admin.testimoni.profile').'`, `'.route('admin.testimoni.update').'`)" class="edit btn btn-success btn-sm">Edit</button> 
                    <button onclick="showDeleteModal(`'.$row->id.'`, `'.route('admin.testimoni.delete').'`)" class="delete btn btn-danger btn-sm">Delete</button>';
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
                'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);
    
            // $upload = uploadPhoto($request);

        }

        $action = Testimoni::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo' => isset($upload) ? $upload['image'] : ''
        ]);

        $upload = uploadPhoto($request);

        $body = [
            'photo' => $upload['image']
        ];

        $update = Testimoni::where('id', $action->id)->update($body);

        return response()->json(['message' => 'success insert data'], 201);
    }

    public function profile(Request $request){
        // dd($request->all());
        $eloq = Testimoni::find($request->id);
        
        return response()->json(['message' => 'success', 'data' => $eloq], 200);
    }

    public function update(Request $request){

        // dd($request->all());
        if(isset($request->photo)){

            $this->validate($request,[
                'name' => 'required',
                'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
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
            ['name' => $request->name, 'description' => $request->description]
        );

        try
        {
            $action = Testimoni::where('id', $request->id)->update($body);
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
        $delete = Testimoni::where('id', $request->id)->delete();

        return response()->json(['message' => 'success delete data'], 200);
    }
}
