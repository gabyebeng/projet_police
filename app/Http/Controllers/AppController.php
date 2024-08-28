<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Control;
use App\Models\Policier;
use App\Models\Equipe;
use App\Models\Unite;

class AppController extends Controller
{
    public function recherche_policier(Request $request)
    {
        $recherche = $request->recherche;
        $policiers = Policier::where(function ($query) use ($recherche) {
            $query->where('nom', 'like', '%' . $recherche . '%')
                ->orWhere('matricule', '=', $recherche)
                ->orWhere('unite_id', 'LIKE', '%' . $recherche . '%');
        })->latest()->paginate(50);
        return view('pages.policier', compact('policiers'));
    }


    public function index()
    {
        $totalPoliciers = Policier::All()->count();
        $totalControls = Control::all()->count();
        $totalUtilisateurs = User::all()->count();
        $totalEquipes = Equipe::all()->count();
        $present = Control::where('statut', '=', 'OK')->count();
        $absent = Control::where('statut', '=', 'PAS OK')->count();
        $controls = Control::where('statut', '=', 'OK')->latest();
        if ($totalControls > 0) {
            $presentPourcentage = $present * 100 / $totalControls;
            $absentPourcentage = $absent * 100 / $totalControls;
        } else {
            $presentPourcentage = 0;
            $absentPourcentage = 0;
        }
        return view('dashboard', compact(
            'present',
            'absent',
            'totalPoliciers',
            'totalControls',
            'totalUtilisateurs',
            'totalEquipes',
            'presentPourcentage',
            'absentPourcentage',
            'controls',
        ));
    }

    public function listPolicier()
    {
        // $policiers = Policier::paginate(50);
        $policiers = Policier::paginate(50);
        return view('pages.policier', compact('policiers'));
    }


}
