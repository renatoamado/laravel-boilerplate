<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
// use App\Models\ParametrizacaoApi;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Route::pattern('id', '[0-9]{1,10}');

        $this->registerPolicies();

        // Auth::extend('cas', function($app, $name, array $config){
        //     return new PioneiraGuard(Auth::createUserProvider($config['provider']), $app->make('request'));
        // });

        if (!$this->app->routesAreCached()) {
            Passport::routes();
        }

        // Route::model('parametrizacao_apis', ParametrizacaoApi::class);
    }
}
