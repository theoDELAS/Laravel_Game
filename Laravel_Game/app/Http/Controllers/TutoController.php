<?php

namespace App\Http\Controllers;

use App\Personnage;
use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;

class TutoController extends Controller
{
    public function index()
    {
        if (Gate::denies('first-users')) {
            if (Gate::denies('admin-users')) {
                return redirect(route('home'));
            }
            return redirect(route('admin.users.index'));
        }

        $users = User::all();
        return view('tuto.introduction')->with('users', $users);
    }

    public function tuto1() {
        return view('tuto.tuto1');
    }

    public function passerTuto(User $user) {
        $userRole = Role::where('name', 'user')->first();
        // enleve le role de l'user
        $user->roles()->detach();
        // lui met son nouveau role 'user'
        $user->roles()->attach($userRole);
        //redirige vers la page 'home'
        return redirect(route('home'));

    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }
}
