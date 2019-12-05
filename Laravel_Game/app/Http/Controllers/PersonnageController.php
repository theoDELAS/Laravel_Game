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
use Illuminate\Support\Facades\DB;

class PersonnageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // retourne la vue home avec comme parametres mon personnage stocké dans la variable $personnage
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Selectionne mes classe
        $classes = Classe::all();

        // retourne ma vue de création de personnage avec comme parametre mes classe stockées dans la variable $classe
        return view ('personnages.create')->with('classes', $classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store()
    {
        // ma requete a besoin d'un pseudo pour etre valide
        request()->validate([
            'pseudo' => 'required',
        ]);
        $classe = Classe::get()->where('name', request('classe'))->first();

        // crée mon personnage avec les valeurs de ma requete
        $personnage = Personnage::create([
            'pseudo' => request('pseudo'),
            // un personnage commence toujours lvl 0
            'lvl_perso' => 0,
            // un personnage a complété 0 histoire à la création
            'histoire_completed' => 0,
            // a le nombre de hp de base de sa classe
            'hp' => $classe->hp,
            // a le nombre de degats de base de sa classe
            'degats' => $classe->degats,
            // a le nombre de defense de base de sa classe
            'defense' => $classe->defense,
            // a le nombre d'esquive de base de sa classe
            'esquive' => $classe->esquive,
        ]);

        // Crée un inventaire
        $inventaire = Inventaire::create([
            // nombre de slot disponnible
            'nombre_slot' => 10,
            // l'inventaire est vide
            'nombre_item' => 0,
        ]);

        // sauvegarde le personnage créé et envoie les infos dans la bdd
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
        // Supprime le personnage
        $personnage->delete();
        // Supprime la liaison entre le personnage et l'utilisateur à qui il appartient
        $personnage->user()->detach();
        // Supprime l'inventaire du personnage
        $personnage->inventaire()->delete();
        // Supprime la liaison entre l'inventaire et le personnage
        $personnage->inventaire()->detach();
        // Supprime la liaison entre le personnage et sa classe
        $personnage->classe()->detach();

        return redirect()->route('home');
    }

    public function getItem() {
        $personnage = Personnage::get()->where('pseudo', request('pseudo'))->first();
        $item = Item::get()->where('nom', request('nom'))->first();
        $inventaire = Inventaire::get()->last();


        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();


        $personnage->update([
            'hp' => ($personnage->hp +  $item->hp),
            'degats' => ($personnage->degats +  $item->degats),
            'defense' => ($personnage->defense +  $item->defense),
            'esquive' => ($personnage->esquive +  $item->esquive),
        ]);

        $inventaire->update([
            'nombre_slot' => ($inventaire->nombre_slot -  1),
            'nombre_item' => ($inventaire->nombre_item +  1),
        ]);

        $inventaire->items()->attach($item);

        return redirect()->back()->withErrors([
            'success' => 'Objet équipé. Vos statistiques vienne d\'être modifiées',
            'itemsInventaire' => $itemsInventaire
        ]);

    }
}
