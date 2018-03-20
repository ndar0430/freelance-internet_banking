<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\UserDetails;
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

        Validator::extend('UserIdHasRoleAlready', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('role_user')->where('role_id', $value)
                                        ->where('user_id', $parameters[0])
                                        ->count();
        
            return $count === 0;
        });

        if(Auth::guest()){

        }
        else{
            View::composer('*', function ($view) {

                $getcurrentUser = Auth::user()->users_details_id;
    
                $user = UserDetails::where('id', $getcurrentUser)->get();
       
               $view->with('user', $user);
           });

        }


       
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
