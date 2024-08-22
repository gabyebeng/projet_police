<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\User;
use App\Http\Requests\EquipeRequest;
use Illuminate\Support\Facades\Auth;


class EquipeController extends Controller
{
    public function listequipe()
    {
        $monId = Auth::user()->id;
        if (Auth::user()->role == "Admin") {
            $equipes = Equipe::with('user')->paginate(5);
            $users = User::All();
            $totalEquipe = Equipe::all()->count();

            return view('equipes.index', compact('equipes', 'users', 'totalEquipe'));
        } else {

            $equipes = Equipe::where('user_id', $monId)->with('user')->paginate(5);
            $totalEquipe = Equipe::where('user_id', $monId)->count();

            return view('equipes.index', compact('equipes', 'totalEquipe'));
        }


    }
    public function ajouter(EquipeRequest $request, Equipe $equipe)
    {
        $equipe::create($request->all());
        return redirect()->back()->with('message', 'Enregistrement Reussi!');

    }
    public function del(Equipe $equipe)
    {
        $equipe->delete();
        return redirect()->back()->with('message', 'Suppression Reussie!');
    }
    public function update(Equipe $equipe, Request $request)
    {
        $equipe->user_id = $request->user_id;
        $equipe->update();
        return redirect(route('equipe.index'))->with('message', 'Modification Reussie!');
    }
    public function edit(Equipe $equipe, User $users)
    {
        $users = User::all();
        return view('equipes.edit', compact('equipe', 'users'));
    }
}
