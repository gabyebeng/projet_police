<?php

namespace App\Providers;

use App\Models\Control;
use App\Models\Equipe;
use App\Models\User;
use Carbon\Carbon;
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


        $currentYear = date('Y'); //pour l'année
        $currentMonth = date('M'); //pour le mois
        $currentDay = date('D'); //pour le jour


        view()->share("totalEquipe", Equipe::all()->count());
        view()->share("totalUser", User::all()->count());
        view()->share("totalControl", Control::all()->count());
        view()->share("controlToday", Control::where("dateCtrl", today())->count());
    }
}
