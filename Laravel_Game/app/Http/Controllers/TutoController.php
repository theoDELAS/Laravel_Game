<?php

namespace App\Http\Controllers;

use App\Item;
use App\Personnage;
use App\Role;
use App\User;
use Faker\Provider\Person;
use Gate;
use Illuminate\Http\Request;

class TutoController extends Controller
{
    public function index()
    {
        $this->isFirstRedirect();

        $users = User::all();
        return view('tuto.introduction')->with('users', $users);
    }

    public function page1()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        return view('tuto.page1')->with('personnage', $personnage);
    }

    public function page2()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        return view('tuto.page2')->with('personnage', $personnage);
    }

    public function page3()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        return view('tuto.page3')->with('personnage', $personnage);
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

    public function isFirstRedirect() {
        // Si le joueur à le status admin il est redirigé vers la page admin, si c'est un user normal il est dirigé vers sa page home
        if (Gate::denies('first-users')) {
            if (Gate::denies('admin-users')) {
                return redirect(route('home'));
            }
            return redirect(route('admin.users.index'));
        }
    }
}
