<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Mission;
use App\Http\Requests\MissionRequest;

class MissionController extends Controller
{
    public function listmission(){
        $missions=Mission::with('equipe')->paginate(5);
        $equipes=Equipe::All();
        $totalMission=Mission::all()->count();

        return view('missions.index', compact('missions', 'equipes', 'totalMission'));
    }
    public function ajouter(MissionRequest $request, Mission $mission){
        $mission::create($request->all());
        return redirect()->back()->with('message', 'Enregistrement Reussi!');
        
    }
    public function del(Mission $mission){
        $mission->delete();
        return redirect()->back()->with('message', 'Suppression Reussie!');
    }
    public function update(Mission $mission, Request $request){
        $mission->equipe_id=$request->equipe_id;
        $mission->update();
        return redirect(route('mission.index'))->with('message', 'Modification Reussie!');
    }
    public function edit(Mission $mission, Equipe $equipe){
        $equipes=Equipe::all();
        return view('missions.edit', compact('equipes', 'mission'));
    }
}
