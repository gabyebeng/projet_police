<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Control;
use App\Models\Policier;
use App\Models\Unite;
use App\Models\Equipe;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class ControlController extends Controller
{
    public function chargement(Control $controls)
    {
        ini_set('max_execution_time', 3600);
        $policiers = Policier::all();

        if (Control::all()->count() == 0) {
            foreach ($policiers as $policier) {
                $controls->create([
                    'matricule' => $policier->matricule,
                    'nom' => $policier->nom,
                    'grade' => $policier->grade,
                    'unite_id' => $policier->unite_id,
                    'province' => $policier->province,
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
        $control->dateCtrl = today();
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
            if ($monEq == null) {
                return redirect()->back()->with('message', 'Le militaire ne fait pas partir des vos unités de control');
            } else {
                $monEqId = $monEq->id;
                $policeUnite = Unite::where('nom', $control->unite_id)->first();
                try {
                    $idUnite = $policeUnite->id;
                    $unitesValide = Unite::where('equipe_id', $monEqId)->where('id', $idUnite)->count();

                    if ($unitesValide > 0) {

                        $monId = Auth::user()->id;
                        $monEq = Equipe::where('user_id', $monId)->first();
                        $monEqId = $monEq->id;
                        $unites = Unite::where('equipe_id', $monEqId)->with('equipe')->get();
                        return view('controls.edit', compact('control', 'unites'));
                    } else {
                        return redirect()->back()->with('message', 'Le militaire ne fait pas partir des vos unités de control');
                    }
                } catch (\Exception $e) {
                    return redirect()->back()->with('message', 'Le militaire ne fait pas partir des vos unités de control');
                }

            }


        }

    }
    public function recherche(Request $request)
    {
        $recherche = $request->recherche;
        if ($recherche == "") {
            $controls = Control::latest()->orderBy("dateCtrl", "desc")->paginate(10);
        } else {
            $controls = Control::where(function ($query) use ($recherche) {
                $query->where('nom', 'like', '%' . $recherche . '%')
                    ->orwhere('matricule', '=', $recherche)
                    ->orwhere('unite_id', 'like', '%' . $recherche . '%');
            })->orWhereHas('equipe', function ($query) use ($recherche) {
                $query->where('nom', '=', $recherche);
            })->latest()->orderBy("dateCtrl", "desc")->paginate(10);
        }
        return view('controls.index', compact('controls'));
    }
    public function del(Control $control)
    {

        return view('confirm_del', compact('$control'));
    }
    public function index()
    {
        $controls = Control::with('equipe')->latest()->orderBy("dateCtrl", "desc")->paginate(50);
        return view('controls.index', compact('controls'));
    }
}
