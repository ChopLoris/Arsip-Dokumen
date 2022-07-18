<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class AccountController extends Controller
{
    public function index()
    {
        return view('form.account');
    }

    public function postData(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'level' => 'required|integer',
            'password' => 'required',
        ],
        [
            'name.required' => 'Anda harus memasukkan data nama',
            'username.required' => 'Anda harus memasukkan data username',
            'email.required' => 'Anda harus memasukkan data email',
            'level.required' => 'Anda harus memasukkan data level user',
            'level.integer' => 'Anda harus memasukkan data nomor pada level user',
            'password.required' => 'Anda harus memasukkan data password',
            'username.unique' => 'Username sudah pernah digunakan',
            'email.unique' => 'Email sudah pernah digunakan',
        ]);

        if (!$validate->fails()){
            User::updateOrCreate([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'is_admin' => false,
                'password' => bcrypt($request->password),
            ]);
            return response()->json(['message' => 'Anda berhasil menambahkan account baru kedalam aplikasi.']);
        }

        return response()->json(['message' => $validate->errors()->all()], 404);
    }

    public function apiListUser()
    {
        $user = User::select('id', 'name', 'username', 'email', 'is_admin')->get();
        return Datatables::of($user)
                ->addIndexColumn()
                ->addColumn('action', function($user){
                    $actionBtn = '<button type="button" class="btn btn-warning waves-effect me-2 waves-light btn-edit"
                    data-bs-toggle="modal" data-id="'.$user->id.'" data-bs-target="#edit-account">Edit</button>';
                    $actionBtn .= '<button type="button" class="btn btn-danger waves-effect waves-light btn-delete"
                    data-id="'.$user->id.'">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function apiUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function updateUser(Request $request,$id)
    {
        $validate = Validator::make($request->all(), [
            'name_edit' => 'required',
            'username_edit' => 'required',
            'email_edit' => 'required|email',
            'level_edit' => 'required|integer',
        ],
        [
            'name.required' => 'Anda harus memasukkan data nama',
            'username.required' => 'Anda harus memasukkan data username',
            'email.required' => 'Anda harus memasukkan data email',
            'level.required' => 'Anda harus memasukkan data level user',
            'level.integer' => 'Anda harus memasukkan data nomor pada level user',
            'username.unique' => 'Username sudah pernah digunakan',
            'email.unique' => 'Email sudah pernah digunakan',
        ]);
        $user = User::findOrFail($id);
        if(!$validate->fails())
        {
            if(!empty($request->pass_edit))
            {
                $user->update([
                    'name' => $request->name_edit,
                    'username' => $request->username_edit,
                    'email' => $request->email_edit,
                    'is_admin' => $request->level_edit,
                    'password' => $request->pass_edit,
                ]);
            }
            else
           {
            $user->update([
                'name' => $request->name_edit,
                'username' => $request->username_edit,
                'email' => $request->email_edit,
                'is_admin' => $request->level_edit,
            ]);
           }
            return response()->json(['message' => 'Anda berhasil mengupdate data akun '.$request->name_edit]);
        }

        return response()->json(['message' => 'Sepertinya data yang anda masukkan sudah pernah ada.'], 404);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        User::destroy($id);
        return response()->json(['message' => 'Anda berhasil menghapus akun'.$user->name]);
    }
}
