<?php

namespace App\Providers;

use App\Usertoken;
use Illuminate\Support\Facades\Gate;
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
        
        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('api_token')) {
                return Usertoken::where('api_token', $request->header('api_token'))->first();
            }
        });
    }
}
