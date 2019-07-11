<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Passport::routes();
        Passport::enableImplicitGrant();
        Passport::personalAccessClientId(1);

        Passport::routes(function ($router) {
            $router->forAccessTokens();
            $router->forPersonalAccessTokens();
            $router->forTransientTokens();
        });
        
        Passport::tokensExpireIn(Carbon::now()->addMinutes(10));
        
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(10));
        
        Passport::tokensCan([
            'administracao' => 'Token administracao para acesso ao administrador do sistema',
            'mesario' => 'Token mesario para instalacao da urna',
            'urna' => 'Token urna para chamadas internas da urna',
            'eleitor' => 'Token eleitor habilitado para votar',
        ]);

    }
}
