<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\UniteController;

route::get('/', [AuthController::class, 'login'])->name('login');
route::get('/index', [AuthController::class, 'index'])->name('user.index');
route::post('/', [AuthController::class, 'handleLogin'])->name('handleLogin');
route::put('/', [AuthController::class, 'save_user'])->name('user.registration');
route::get('/del/{user}', [AuthController::class, 'del'])->name('user.del');
route::get('/logout', [AuthController::class, 'deconnecter'])->name('user.deconnecter');


//route securisé
route::middleware('auth')->group(function () {

    route::get('/dashboard', [AppController::class, 'index'])->name('dashboard');

    route::prefix('equipes')->group(function () {
        route::post('/', [EquipeController::class, 'ajouter'])->name('equipe.ajouter');
        route::get('/', [EquipeController::class, 'listequipe'])->name('equipe.index');
        route::get('/del/{equipe}', [EquipeController::class, 'del'])->name('equipe.del');
        route::get('/update/{equipe}', [EquipeController::class, 'edit'])->name('equipe.edit');
        route::put('/update/{equipe}', [EquipeController::class, 'update'])->name('equipe.update');
    });
    route::prefix('missions')->group(function () {
        route::post('/', [MissionController::class, 'ajouter'])->name('mission.ajouter');
        route::get('/', [MissionController::class, 'listmission'])->name('mission.index');
        route::get('/del/{mission}', [MissionController::class, 'del'])->name('mission.del');
        route::get('/update/{mission}', [MissionController::class, 'edit'])->name('mission.edit');
        route::put('/update/{mission}', [MissionController::class, 'update'])->name('mission.update');
    });
    route::prefix('policiers')->group(function () {
        route::post('/', [AppController::class, 'recherche_policier'])->name('policier.search');
        route::get('/', [AppController::class, 'listPolicier'])->name('policier.index');
    });

    route::prefix('controls')->group(function () {
        route::post('/', [ControlController::class, 'recherche'])->name('control.search');
        route::get('/', [ControlController::class, 'index'])->name('control.index');
        route::get('/ajouter', [ControlController::class, 'ajouter'])->name('control.ajouter');
        route::get('/update/{control}', [ControlController::class, 'edit'])->name('control.edit');
        route::put('/update/{control}', [ControlController::class, 'update'])->name('control.update');
        route::get('/del/{control}', [ControlController::class, 'del'])->name('control.del');
        route::get('/upgrade', [ControlController::class, 'chargement'])->name('control.charger');
    });
    route::prefix('unites')->group(function () {
        route::get('/update/{unite}', [uniteController::class, 'edit'])->name('unite.edit');
        route::put('/update/{unite}', [UniteController::class, 'update'])->name('unite.update');
        route::post('/', [UniteController::class, 'recherche_unite'])->name('unite.search');
        route::get('/', [UniteController::class, 'listUnite'])->name('unite.index');
    });
    route::prefix('configurations')->group(function () {
        route::get('/', [ConfigController::class, 'index'])->name('configuration.index');
        route::post('/import', [ConfigController::class, 'importerPolicier'])->name('configuration.import');
        route::post('/import-unite', [ConfigController::class, 'importerUnite'])->name('import.unite');
        route::get('/export-unite', [ConfigController::class, 'exportUnite'])->name('export.unite');
        route::get('/export-policier', [ConfigController::class, 'exportPolicier'])->name('export.policier');
        route::get('/export-present', [ConfigController::class, 'exportControl'])->name('export.control');
        route::get('/export-absent', [ConfigController::class, 'exportAbsent'])->name('export.absent');
        route::get('/charge_unite', [ConfigController::class, 'chargeUniteImport'])->name('charger.unite');
    });
});

