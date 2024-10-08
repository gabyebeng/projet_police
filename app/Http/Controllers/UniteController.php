<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unite;
use App\Models\Equipe;
use Illuminate\Support\Facades\Auth;

class UniteController extends Controller
{
    public function recherche_unite(Request $request)
    {
        $unites = Unite::where("nom", "like", "%" . $request->recherche . "%")->with('equipe')->paginate(5);
        // dd($unites->nom);
        return view('unites.index', compact('unites'));
    }
    public function listUnite()
    {
        if (Auth::user()->role == 'Admin') {
            $unites = Unite::with('equipe')->latest()->paginate(20);
            return view('unites.index', compact('unites'));
        } else {
            $monId = Auth::user()->id;
            $monEq = Equipe::where('user_id', $monId)->first();
            if ($monEq == null) {
                $monEqId = 0;
                $unites = Unite::where('equipe_id', $monEqId)->with('equipe')->latest()->paginate(5);
            } else {
                $monEqId = $monEq->id;
                $unites = Unite::where('equipe_id', $monEqId)->with('equipe')->latest()->paginate(5);
            }


            return view('unites.index', compact('unites'));
        }
    }

    public function update(Unite $unite, Request $request)
    {
        $unite->equipe_id = $request->equipe_id;
        $unite->update();
        return redirect(route('unite.index'))->with('message', 'L\'unité à bien été chargée à l\'equipe!');
    }
    public function edit(Unite $unite, Equipe $equipe)
    {
        $equipes = Equipe::all();
        return view('unites.edit', compact('equipes', 'unite'));
    }
}
