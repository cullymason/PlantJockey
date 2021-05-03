<?php

namespace App\Providers;

use App\Models\Cell;
use App\Models\Plant;
use App\Models\Tray;
use App\Policies\CellPolicy;
use App\Policies\PlantPolicy;
use App\Policies\TrayPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Tray::class => TrayPolicy::class,
        Cell::class => CellPolicy::class,
        Plant::class => PlantPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
