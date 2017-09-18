<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->cookie('user_id')) {
//                $user = DB::table('user_info')->where('userId', $request->cookie('user_id'))->first();
//                $user = json_decode(json_encode($user),true);
//                var_dump(json_decode(json_encode($user),true));
//                return new GenericUser($user);
                return DB::table('user_info')->where('userId', $request->cookie('user_id'))->first();
//                return User::where('api_token', $request->input('api_token'))->first();
            }
        });
    }
}
