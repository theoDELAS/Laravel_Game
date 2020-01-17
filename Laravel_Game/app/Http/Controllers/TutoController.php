<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Item;
use App\Monstre;
use App\Personnage;
use App\Role;
use App\User;
use Faker\Provider\Person;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutoController extends Controller
{
    public function index()
    {
        $this->isFirstRedirect();

        $users = User::all();
        $classes = Classe::all();
        return view('tuto.introduction')->with([
            'users'=> $users,
            'classes' => $classes,
        ]);
    }

    public function debut()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        $items = Item::all();
        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();
        return view('tuto.debut')->with([
            'personnage'=> $personnage,
            'items' => $items,
            'itemsInventaire' => $itemsInventaire,
        ]);
    }

    public function combatChevaux()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        $items = Item::all();
        $monstres = Monstre::all();
        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();
        return view('tuto.combatChevaux')->with([
            'personnage'=> $personnage,
            'items' => $items,
            'itemsInventaire' => $itemsInventaire,
            'monstres' => $monstres,
        ]);
    }

    public function combatSneaky()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        $items = Item::all();
        $monstres = Monstre::all();
        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();
        return view('tuto.combatSneaky')->with([
            'personnage'=> $personnage,
            'items' => $items,
            'itemsInventaire' => $itemsInventaire,
            'monstres' => $monstres,
        ]);
    }

    public function fin()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        $items = Item::all();
        $monstres = Monstre::all();
        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();
        return view('tuto.fin')->with([
            'personnage'=> $personnage,
            'items' => $items,
            'itemsInventaire' => $itemsInventaire,
            'monstres' => $monstres,
        ]);
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
