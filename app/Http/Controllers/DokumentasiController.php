<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DokumentasiController extends Controller
{
    public function index(){
        $category = new Category();
        $data = $category->all();
        $user = new User();
        $user = $user->find(Auth::id());
        $user = $user->post;
        $user->transform(function ($item) {
            $nameCategory = Category::find($item->category_id)->name;
            $item->jenis_doc = $nameCategory;
            return $item;
        });

        $table = "posts";
        $primary = "id";
        $prefix = "DOC-";
        $kodeDokumen = Post::autonumber($table, $primary, $prefix);
        return view('form.tulisSurat')
                ->with('categories', $data)
                ->with('lastpost', $user)
                ->with('kodeDokumen', $kodeDokumen);
    }

    public function post(Request $request){

        $validator = Validator::make($request->all(), [
            'no_dokumen' => 'required',
            'jenis_dokumen' => 'required',
            'pekerjaan' => 'required',
            'tgl_pekerjaan' => 'required',
            'tgl_selesai' => 'required',
            'description' => 'required',
            'filenames' => 'required|mimes:pdf',
        ],
        [
            'no_dokumen.required' => 'Anda harus memasukkan Nomor Dokumen',
            'jenis_dokumen.required' => 'Anda harus memasukkan Jenis Dokumen',
            'pekerjaan.required' => 'Anda harus memasukkan Pekerjaan',
            'tgl_pekerjaan.required' => 'Anda harus memasukkan Tanggal Pekerjaan',
            'tgl_selesai.required' => 'Anda harus memasukkan Selesai Pekerjaan',
            'description.required' => 'Anda harus memasukkan Deskripsi',
            'filenames.mimes' => 'Format yang anda masukkan bukan berupa pdf, docx, etc.',
        ]);

        if ($validator->fails()) {
            return redirect('/tulis-dokumentasi')
                        ->withErrors($validator)
                        ->withInput();
        }

        $post = new Post;
        $post->nomor_dokumen = $request->no_dokumen;
        $post->pekerjaan = $request->pekerjaan;
        $post->tanggal_pelaksanaan = $post->getBeginAttribute($request->tgl_pekerjaan);
        $post->akhir_pelaksanaan = $post->getBeginAttribute($request->tgl_selesai);
        $post->description = $request->description;
        $post->user()->associate(Auth::id());
        $post->category()->associate($request->jenis_dokumen);

        if(isset($request->no_surat)){
            $post->nomor_surat = $request->no_surat;
        }

        $filename = $request->pekerjaan.'-'.time().'.'.$request->filenames->extension();
        $post->file_name = $filename;
        Storage::putFileAs('public/dokumentasi/'.Category::find($request->jenis_dokumen)->name, $request->filenames, $filename);
        $post->save();
        return back()->with('success', 'Anda berhasil menambahkan dokumentasi dengan tujuan pekerjaan'.$request->pekerjaan);
    }
}
