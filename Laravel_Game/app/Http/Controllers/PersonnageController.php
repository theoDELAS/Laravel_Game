<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Inventaire;
use App\Item;
use App\Personnage;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Http\Response;

class PersonnageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Selectionne le dernier personnage de la bdd
        $personnage = Personnage::latest()->get();

        // retourne la vue home avec comme parametres mon personnage stocké dans la variable $personnage
        return view('home', ['personnage' => $personnage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Selectionne mes classes
        $classes = Classe::all();

        // retourne ma vue de création de personnage avec comme parametre mes classes stockées dans la variable $classes
        return view ('personnages.create')->with('classes', $classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // ma requete a besoin d'un pseudo pour etre valide
        request()->validate([
            'pseudo' => 'required',
        ]);

        // crée mon personnage avec les valeurs de ma requete
        $personnage = Personnage::create([
            'pseudo' => request('pseudo'),
            // un personnage commence toujours lvl 0
            'lvl_perso' => 0,
            // un personnage a complété 0 histoire à la création
            'histoire_completed' => 0,
        ]);

        // Crée un inventaire
        $inventaire = Inventaire::create([
            // nombre de slot disponnible
            'nombre_slot' => 10,
            // l'inventaire est vide
            'nombre_item' => 0,
        ]);

        // sauvegarde le personnage créé et envoie les info dans la bdd
        $personnage->save();

        // Selectionne l'user qui vient de créer ce personnage
        $user = User::select('id')->where('name', auth()->user()->name)->first();
        // Assigne au personnage créé son utilisateur
        $personnage->user()->attach($user);

        // Selectionne la classe du personnage créé
        $classe = Classe::select('id')->where('name', request('classe'))->first();
        // Assigne au personnage, sa classe
        $personnage->classe()->attach($classe);

        // Selectionne l'inventaire créé (le dernier)
        $newInventaire = Inventaire::select('id')->get()->last();
        // Assigne au personnage, son inventaire
        $personnage->inventaire()->attach($newInventaire);

        // Si n'a pas le role 'first-users'
        if (Gate::denies('first-users')) {
            // alors il est redirigé vers la page home
            return redirect(route('home'));
        }
        // Selectionne tous les users
        $users = User::all();
        // redirige vers la page 1 du tuto avec comme parametres mes users stockés dans la variable $users avec comme mot clé 'users'
        return redirect('tuto/page1')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Personnage $personnage
     * @return void
     * @throws Exception
     */
    public function destroy(Personnage $personnage)
    {
        $personnage->delete();

        return redirect()->route('home');
    }

    public function getItem() {
        $item = Item::select('id')->where('nom', 'Epée');
        $inventaire = Inventaire::where('id', 1)->get()->last();

        $inventaire->items()->attach($item);

        return redirect(route('tuto.page2'));

    }
}
