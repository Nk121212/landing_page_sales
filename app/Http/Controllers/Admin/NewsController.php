<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use Yajra\DataTables\Datatables;
use Exception;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $arrParam = [
            'createUrl' => route('admin.news.create'),
            'updateUrl' => route('admin.news.update')
        ];

        return view('admin.news')->with(['action' => $arrParam]);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = News::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button onclick="getProfile(`' . $row->id . '`, `' . route('admin.news.profile') . '`, `' . route('admin.news.update') . '`)" class="edit btn btn-success btn-sm">Edit</button> 
                    <button onclick="showDeleteModal(`' . $row->id . '`, `' . route('admin.news.delete') . '`)" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(Request $request)
    {

        // dd($request->all());
        if (isset($request->photo)) {

            $this->validate($request, [
                'judul' => 'required',
                'news_date' => 'required',
                // 'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);

            // $upload = uploadPhoto($request);
        }

        $action = News::create([
            'judul' => $request->judul,
            'news_date' => $request->news_date,
            'description' => $request->description,
            'photo' => '-'
        ]);

        $upload = uploadPhoto($request, $action->id);

        $body = [
            'photo' => $upload['image']
        ];

        $update = News::where('id', $action->id)->update($body);

        return response()->json(['message' => 'success insert data'], 201);
    }

    public function profile(Request $request)
    {
        // dd($request->all());
        $eloq = News::find($request->id);

        return response()->json(['message' => 'success', 'data' => $eloq], 200);
    }

    public function update(Request $request)
    {

        // dd($request->all());
        if (isset($request->photo)) {

            $this->validate($request, [
                'judul' => 'required',
                'news_date' => 'required',
                'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);

            $upload = uploadPhoto($request);
        }

        if (isset($upload)) {
            $arrPhoto = ['photo' => $upload['image']];
        } else {
            $arrPhoto = [];
        }

        $body = array_merge(
            $arrPhoto,
            [
                'judul' => $request->judul,
                'news_date' => $request->news_date,
                'description' => $request->description
            ]
        );

        try {
            $action = News::where('id', $request->id)->update($body);
            return response()->json(['message' => 'success update data'], 200);
        } catch (Exception $e) {
            // dd($e->getMessage());
            return response()->json(['message' => 'failed update data', 'real_message' => $e->getMessage()], 500);
        }
    }

    public function delete(Request $request)
    {
        // dd($request->all());
        $delete = News::where('id', $request->id)->delete();

        return response()->json(['message' => 'success delete data'], 200);
    }
}
