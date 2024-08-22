<?php

namespace App\Providers;

use App\Models\Equipe;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        view()->share("totalEquipe", Equipe::all()->count());
        view()->share("totalUser", User::all()->count());
    }
}
