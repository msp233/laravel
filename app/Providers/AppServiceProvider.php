<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        DB::listen(function($query){
            //查看sql语句
            //echo $query->sql;
            //查看错误信息
            //var_dump($query->bindings);
            //查看调用时间
            echo $query->time;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
