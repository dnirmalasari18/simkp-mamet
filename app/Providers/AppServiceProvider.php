<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\StudentDetail;

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
        if (Auth::check()){
            $reqs = Auth::user()->details;
            view()->share('reqs',$reqs);
        } else {
            $reqs = StudentDetail::all();
            view()->share('reqs',$reqs);
        }
    }
}
