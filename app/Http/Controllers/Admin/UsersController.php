<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Yajra\DataTables\Datatables;
Use Exception;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // dd(getCategori());
        $arrParam = [
            'createUrl' => route('admin.my-users.create'),
            'updateUrl' => route('admin.my-users.update')
        ];

        return view('admin.my-users')->with(['action' => $arrParam]);
    }

    public function datatable(Request $request){
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button onclick="getProfile(`'.$row->id.'`, `'.route('admin.my-users.profile').'`, `'.route('admin.my-users.update').'`)" class="edit btn btn-success btn-sm">Edit</button> 
                    <button onclick="showDeleteModal(`'.$row->id.'`, `'.route('admin.my-users.delete').'`)" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(Request $request){

        // dd($request->all());
        if(isset($request->photo) || isset($request->brosur)){

            $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'alamat_kantor' => 'required',
                'password' => 'required',
                'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);
    
            // $upload = uploadPhoto($request);
            // $uploadBrosur = uploadBrosur($request);

        }

        $action = User::create([
            'name' => $request->name,
            'alamat_kantor' => $request->alamat_kantor,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'instagram' => $request->instagram,
            'photo' => '-',
            'status' => $request->status
        ]);

        $upload = uploadPhoto($request);

        $body = [
            'photo' => $upload['image']
        ];

        $update = User::where('id', $action->id)->update($body);

        if($request->status == '1'){
            //set yg lain jadi non aktif
            $this->nonAktifElse($action->id);
        }

        return response()->json(['message' => 'success insert data'], 201);
    }

    public function profile(Request $request){
        // dd($request->all());
        $eloq = User::find($request->id);
        
        return response()->json(['message' => 'success', 'data' => $eloq], 200);
    }

    public function update(Request $request){

        // dd($request->all());
        if(isset($request->photo) || isset($request->brosur) || isset($request->uploadDetail)){

            $this->validate($request,[
                'name' => 'required',
                'alamat_kantor' => 'required',
                'email' => 'required',
                'password' => 'required',
                // 'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);
    
            $upload = uploadPhoto($request);
            // $uploadBrosur = uploadBrosur($request);

        }

        if(isset($upload)){

            $arrImg = [];
            $arrBrosur = [];
            if($upload['image'] !== ""){
                $arrImg = ['photo' => $upload['image']];
            }
            if($upload['brosur'] !== ""){
                $arrBrosur = ['brosur' => $upload['brosur']];
            }

            $arrPhoto = array_merge($arrImg, $arrBrosur);

        }else{
            $arrPhoto = [];
        }

        $body = array_merge(
            $arrPhoto,
            [
                'name' => $request->name,
                'alamat_kantor' => $request->alamat_kantor,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'no_telp' => $request->no_telp,
                'instagram' => $request->instagram,
                'status' => $request->status
            ]
        );

        // dd($body);

        try
        {
            $action = User::where('id', $request->id)->update($body);

            if($request->status == '1'){
                //set yg lain jadi non aktif
                $this->nonAktifElse($request->id);
            }

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
        $delete = User::where('id', $request->id)->delete();

        return response()->json(['message' => 'success delete data'], 200);
    }

    public function nonAktifElse($id){
        User::where('id', '<>', $id)->update(['status' => '0']);
        return true;
    }


}
