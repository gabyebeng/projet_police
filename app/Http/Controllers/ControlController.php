<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Control;
use App\Models\Policier;
use App\Models\Unite;
use App\Models\Equipe;
use Illuminate\Support\Facades\Auth;

class ControlController extends Controller
{
    public function chargement(Control $controls)
    {
        $policiers = Policier::all();

        if (Control::all()->count() == 0) {
            foreach ($policiers as $policier) {
                $controls->create([
                    'policier_id' => $policier->id,
                    'unite_id' => $policier->unite_id,
                ]);
            }
        }
        return redirect()->back();
    }
    public function update(Control $control, Request $request)
    {
        if (Auth::user()->role == "Admin") {

        } else {
            $control->unite_Ctrl = $request->unite_Ctrl;
            $monEq = Equipe::where('user_id', Auth::user()->id)->first();
            $control->equipe_id = $monEq->id;
            $control->dateCtrl = now();
        }

        $control->statut = $request->statut;
        $control->update();
        return redirect(route('control.index'))->with('message', 'Statut Modifié!');
    }
    public function edit(Control $control)
    {
        if (Auth::user()->role == 'Admin') {

            $unites = Unite::all();
            return view('controls.edit', compact('control', 'unites'));
        } else {
            $monId = Auth::user()->id;
            $monEq = Equipe::where('user_id', $monId)->first();
            $monEqId = $monEq->id;
            $unitesValide = Unite::where('equipe_id', $monEqId)->where('id', $control->unite->id)->count();

            if ($unitesValide > 0) {

                $monId = Auth::user()->id;
                $monEq = Equipe::where('user_id', $monId)->first();
                $monEqId = $monEq->id;
                $unites = Unite::where('equipe_id', $monEqId)->with('equipe')->paginate(5);
                return view('controls.edit', compact('control', 'unites'));
            } else {
                return redirect()->back()->with('message', 'Le militaire ne fait pas partir des vos unités de control');
            }
        }

    }
    public function recherche(Request $request)
    {

        $recherche = $request->recherche;
        $controls = Control::where(function ($query) use ($recherche) {
            $query->where('id', '=', $recherche);
        })
            ->orWhereHas('policier', function ($query) use ($recherche) {
                $query->where('nom', '=', $recherche)
                    ->orwhere('matricule', '=', $recherche)
                    ->orwhere('postnom', '=', $recherche)
                    ->orwhere('prenom', '=', $recherche);
            })->latest()
            ->get();


        return view('controls.index', compact('controls'));
    }
    public function del(Control $control)
    {

        return view('confirm_del', compact('$control'));
    }
    public function index()
    {
        $controls = Control::with('unite', 'policier', 'equipe')->paginate(5);
        return view('controls.index', compact('controls'));
    }
}
