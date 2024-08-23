<?php

namespace App\Http\Controllers;

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
        //     return view('Auth.login');
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
    public function handleLogin(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
            // return redirect()->back()-> with('message', 'user connected');
        } else {
            return redirect()->back()->with('message', 'parametre de connexion incorrect!');
            // return view('Auth.login')-> with('message', 'parametre de connexion incorrect!');
        }
    }
}
