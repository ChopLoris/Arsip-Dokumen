<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $surat = Post::where('category_id', 1)->count();
        $rab = Post::where('category_id', 2)->count();
        $bom = Post::where('category_id', 3)->count();
        $spk = Post::where('category_id', 4)->count();
        $dokumentasi = Post::where('category_id', 5)->count();

        view::share('countall', [
            $surat,
            $rab,
            $bom,
            $spk,
            $dokumentasi,
        ]);
    }
}
