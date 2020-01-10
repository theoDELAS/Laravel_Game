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

    public function page1()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        $items = Item::all();
        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();
        return view('tuto.page1')->with([
            'personnage'=> $personnage,
            'items' => $items,
            'itemsInventaire' => $itemsInventaire,
        ]);
    }

    public function page2()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        $items = Item::all();
        $monstres = Monstre::all();
        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();
        return view('tuto.page2')->with([
            'personnage'=> $personnage,
            'items' => $items,
            'itemsInventaire' => $itemsInventaire,
            'monstres' => $monstres,
        ]);
    }

    public function page3()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        $items = Item::all();
        $monstres = Monstre::all();
        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();
        return view('tuto.page3')->with([
            'personnage'=> $personnage,
            'items' => $items,
            'itemsInventaire' => $itemsInventaire,
            'monstres' => $monstres,
        ]);
    }

    public function page4()
    {
        $this->isFirstRedirect();

        $personnage = Personnage::get()->last();
        $items = Item::all();
        $monstres = Monstre::all();
        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();
        return view('tuto.page4')->with([
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
