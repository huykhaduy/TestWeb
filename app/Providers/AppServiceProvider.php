<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
        $cate_menu = DB::table('cate')
            ->get();
        for ($x = 0; $x < count($cate_menu); $x++) {
            $cate_menu[$x]->subMenu = DB::table('chapter')->where('parent_id', $cate_menu[$x]->id)
                ->get();
        }
        View::share('listMenu', $cate_menu);
    }
}
