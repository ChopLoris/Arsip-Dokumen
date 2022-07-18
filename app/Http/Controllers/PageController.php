<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class PageController extends Controller
{
    public function pageSurat()
    {
        return view('page.surat')->with('cat', 1);
    }

    public function getDataSurat(Request $request)
    {
        if($request->ajax())
        {
            try
            {
                $post   = new Post();
                $post   = $post->where('category_id', 1)->get();
                return Datatables::of($post)
                ->addIndexColumn()
                ->addColumn('action', function($post){
                    $actionBtn = '<button type="button" class="btn btn-warning waves-effect me-2 waves-light btn-view"
                    data-bs-toggle="modal" data-id="'.$post->id.'" data-bs-target=".bs-example-modal-xl">View</button>';
                    $actionBtn .= '<a type="button" href="/dokumentasi/'.Category::find($post->category_id)->name.'/'.$post->file_name.'" class="btn btn-info waves-effect me-2 waves-light"
                    data-id="'.$post->id.'">Download</a>';
                    if(Auth::user()->is_admin == 1)
                    {
                        $actionBtn .= '<button type="button" class="btn btn-danger waves-effect waves-light btn-delete"
                        data-id="'.$post->id.'">Delete</button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            catch(ModelNotFoundException $e)
            {
                $default = [
                    'data' => [],
                    'total' => 0,
                    'recordsTotal', 0,
                    'recordsFiltered', 0,
                ];

                return $default;
            }
        }
    }

    public function deleteSurat($id)
    {
        //DELETE FILE
        $post = new Post();
        $categoryID = $post->find($id)->first();
        $path = 'public/dokumentasi/'.Category::find($categoryID->category_id)->name.'/'.$categoryID->file_name;
        if(Storage::exists($path))
        {
            Storage::delete($path);
        }

        //DELETE
        $post = Post::destroy($id);
        return response()->json(['response' => 200, "data" => "Dokumen berhasil di hapus !"]);
    }

    public function apiSurat(Request $request, $id)
    {
        if($request->ajax())
        {
            $post   = new Post();
            $post   = $post->where('id', $id)->get();
            if(!$post->isEmpty()){
                $post->transform(function ($item) {
                    $nameCategory = Category::find($item->category_id)->name;
                    $item->jenis_doc = $nameCategory;
                    return $item;
                });
                return response()->json(['response' => 200, 'data' => $post]);
            }
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    //RAB

    public function pageRAB()
    {
        return view('page.rab')->with('cat', 2);
    }

    public function getDataRAB(Request $request)
    {
        if($request->ajax())
        {
            try
            {
                $post   = new Post();
                $post   = $post->where('category_id', 2)->get();
                return Datatables::of($post)
                ->addIndexColumn()
                ->addColumn('action', function($post){
                    $actionBtn = '<button type="button" class="btn btn-warning waves-effect me-2 waves-light btn-view"
                    data-bs-toggle="modal" data-id="'.$post->id.'" data-bs-target=".bs-example-modal-xl">View</button>';
                    $actionBtn .= '<a type="button" href="/dokumentasi/'.Category::find($post->category_id)->name.'/'.$post->file_name.'" class="btn btn-info waves-effect me-2 waves-light"
                    data-id="'.$post->id.'">Download</a>';
                    $actionBtn .= '<button type="button" class="btn btn-danger waves-effect waves-light btn-delete"
                    data-id="'.$post->id.'">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            catch(ModelNotFoundException $e)
            {
                $default = [
                    'data' => [],
                    'total' => 0,
                    'recordsTotal', 0,
                    'recordsFiltered', 0,
                ];

                return $default;
            }
        }
    }


    //BoM

    public function pageBoM()
    {
        return view('page.BoM')->with('cat', 3);
    }

    public function getDataBoM(Request $request)
    {
        if($request->ajax())
        {
            try
            {
                $post   = new Post();
                $post   = $post->where('category_id', 3)->get();
                return Datatables::of($post)
                ->addIndexColumn()
                ->addColumn('action', function($post){
                    $actionBtn = '<button type="button" class="btn btn-warning waves-effect me-2 waves-light btn-view"
                    data-bs-toggle="modal" data-id="'.$post->id.'" data-bs-target=".bs-example-modal-xl">View</button>';
                    $actionBtn .= '<a type="button" href="/dokumentasi/'.Category::find($post->category_id)->name.'/'.$post->file_name.'" class="btn btn-info waves-effect me-2 waves-light"
                    data-id="'.$post->id.'">Download</a>';
                    $actionBtn .= '<button type="button" class="btn btn-danger waves-effect waves-light btn-delete"
                    data-id="'.$post->id.'">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            catch(ModelNotFoundException $e)
            {
                $default = [
                    'data' => [],
                    'total' => 0,
                    'recordsTotal', 0,
                    'recordsFiltered', 0,
                ];

                return $default;
            }
        }
    }

    //SPK

    public function pageSPK()
    {
        return view('page.SPK')->with('cat', 4);
    }

    public function getDataSPK(Request $request)
    {
        if($request->ajax())
        {
            try
            {
                $post   = new Post();
                $post   = $post->where('category_id', 4)->get();
                return Datatables::of($post)
                ->addIndexColumn()
                ->addColumn('action', function($post){
                    $actionBtn = '<button type="button" class="btn btn-warning waves-effect me-2 waves-light btn-view"
                    data-bs-toggle="modal" data-id="'.$post->id.'" data-bs-target=".bs-example-modal-xl">View</button>';
                    $actionBtn .= '<a type="button" href="/dokumentasi/'.Category::find($post->category_id)->name.'/'.$post->file_name.'" class="btn btn-info waves-effect me-2 waves-light"
                    data-id="'.$post->id.'">Download</a>';
                    $actionBtn .= '<button type="button" class="btn btn-danger waves-effect waves-light btn-delete"
                    data-id="'.$post->id.'">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            catch(ModelNotFoundException $e)
            {
                $default = [
                    'data' => [],
                    'total' => 0,
                    'recordsTotal', 0,
                    'recordsFiltered', 0,
                ];

                return $default;
            }
        }
    }

    //BoM

    public function pageDoc()
    {
        return view('page.Doc')->with('cat', 5);
    }

    public function getDataDoc(Request $request)
    {
        if($request->ajax())
        {
            try
            {
                $post   = new Post();
                $post   = $post->where('category_id', 5)->get();
                return Datatables::of($post)
                ->addIndexColumn()
                ->addColumn('action', function($post){
                    $actionBtn = '<button type="button" class="btn btn-warning waves-effect me-2 waves-light btn-view"
                    data-bs-toggle="modal" data-id="'.$post->id.'" data-bs-target=".bs-example-modal-xl">View</button>';
                    $actionBtn .= '<a type="button" href="/dokumentasi/'.Category::find($post->category_id)->name.'/'.$post->file_name.'" class="btn btn-info waves-effect me-2 waves-light"
                    data-id="'.$post->id.'">Download</a>';
                    $actionBtn .= '<button type="button" class="btn btn-danger waves-effect waves-light btn-delete"
                    data-id="'.$post->id.'">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            catch(ModelNotFoundException $e)
            {
                $default = [
                    'data' => [],
                    'total' => 0,
                    'recordsTotal', 0,
                    'recordsFiltered', 0,
                ];

                return $default;
            }
        }
    }
}
