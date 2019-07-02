<?php

namespace LaraDex\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'LaraDex\Model' => 'LaraDex\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Habilitar passport routes
        Passport::routes();

        Gate::define('validar_ruta', function ($model, $ruta) {
            \Log::info($ruta);
            $plan_vencido = false;
            $rutas_publicas = ["home", "clientes", "productos", "contacto"];
            
            $vista = "";
            if ($plan_vencido) {
                foreach ($rutas_publicas as $r => $key) {
                    if ($key === $ruta) {
                        $vista = "yes";
                    }
                }
            } else {
                $vista = $ruta;
            }

            return $vista ? true : false;
        });

        Gate::before(function ($user, $ability) {
            if (!empty($user->rol) && $user->rol->access_all == 1) {
                return true;
            }
        });
    }
}
