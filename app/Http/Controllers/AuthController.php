<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Mission;
use App\Models\ServEquipe;
use App\Models\ServMission;
use App\Models\ServUnite;
use App\Models\Unite;
use App\Models\UserServ;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Session;

class AuthController extends Controller
{
    public function deconnecter()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route("login")->with("message", "Vous vous êtes deconnecté");
    }
    public function index()
    {
        if (Auth::user()->role == "Admin") {
            $users = User::paginate(5);
            return view('Auth.signup', compact('users'));
        } else {
            $users = User::where('id', Auth::user()->id)->paginate(5);
            return view('Auth.signup', compact('users'));
        }

    }
    public function save_user(User $user, UserRequest $request)
    {
        $user::create($request->all());
        return redirect()->back()->with('message', 'Enregistrement Reussi!');
    }
    public function del(User $user)
    {
        $user->delete();
        return redirect()->back()->with('message', 'Suppression Reussie!');
    }
    public function login()
    {
        return view('Auth.login');
    }
    public function handleLogin(AuthRequest $request, User $user, Equipe $equipe, Unite $unite, Mission $mission)
    {

        $totalUser = User::all()->count();
        if ($totalUser > 0) {
            $credentials = $request->only(['email', 'password']);
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('message', 'parametres de connexion incorrects!');
            }
        } else {
            try {

                $oldEquipes = ServEquipe::all();
                $oldUnites = ServUnite::all();
                $oldUsers = UserServ::all();
                $oldMissions = ServMission::all();
                foreach ($oldUsers as $oldUser) {
                    $user->create([
                        'id' => $oldUser->id,
                        'name' => $oldUser->name,
                        'email' => $oldUser->email,
                        'password' => $oldUser->password,
                        'role' => $oldUser->role,
                    ]);
                }

                foreach ($oldEquipes as $oldEquipe) {
                    $equipe->create([
                        'id' => $oldEquipe->id,
                        'nom' => $oldEquipe->nom,
                        'user_id' => $oldEquipe->user_id,
                    ]);
                }

                foreach ($oldUnites as $oldUnite) {
                    $unite->create([
                        'id' => $oldUnite->id,
                        'nom' => $oldUnite->nom,
                        'equipe_id' => $oldUnite->equipe_id,
                    ]);
                }

                foreach ($oldMissions as $oldMission) {
                    $mission->create([
                        'id' => $oldMission->id,
                        'nom' => $oldMission->nom,
                        'equipe_id' => $oldMission->equipe_id,
                    ]);
                }
                return redirect()->back()->with('message', 'Données chargées, Réconnectez-vous!');
            } catch (Exception $e) {
                return redirect()->back()->with('message', 'Le serveur distant injoinnable!');
            }
        }
    }
}
