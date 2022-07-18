<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $countDoc = Post::all()->count();
        $countUser = User::all()->count();

        $post = Post::latest()->take(6)->get();
        $post->map(function ($item) {
            $nameUser = User::find($item->user_id)->name;
            $nameCategory = Category::find($item->category_id)->name;
            $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->copy()->tz(Auth::user()->timezone)->format('F j, Y');
            $createdAt2 = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->copy()->tz(Auth::user()->timezone)->format('M j');
            $item->name_user = $nameUser;
            $item->name_category = $nameCategory;
            $item->dateCreate = $createdAt;
            $item->dateCreate2 = $createdAt2;
            return $item;
        });
        return view('dashboard')->with([
            'countUser' => $countUser,
            'countDoc' => $countDoc,
            'data' => $post,
        ]);
    }
}
