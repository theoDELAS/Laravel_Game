<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Inventaire;
use App\Item;
use App\Monstre;
use App\Personnage;
use App\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PersonnageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        // retourne la vue home avec comme parametres mon personnage stocké dans la variable $personnage
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
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
            'hp_base' => $classe->hp,
            'hp_current' => $classe->hp,
            'hp_max' => $classe->hp,
            // a le nombre de degats de base de sa classe
            'degats_base' => $classe->degats,
            'degats_current' => $classe->degats,
            'degats_max' => $classe->degats,
            // a le nombre de defense de base de sa classe
            'defense_base' => $classe->defense,
            'defense_current' => $classe->defense,
            'defense_max' => $classe->defense,
            // a le nombre d'esquive de base de sa classe
            'esquive_base' => $classe->esquive,
            'esquive_current' => $classe->esquive,
            'esquive_max' => $classe->esquive,
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
        return redirect('tuto/debut')->with('users', $users);
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
        $item = Item::get()->where('name', request('name'))->first();
        $inventaire = Inventaire::get()->last();

        $persoInventaire = $personnage->inventaire()->get()->first();
        $itemsInventaire = $persoInventaire->items()->get()->all();

        $personnage->update([
            'hp_current' => ($personnage->hp_current +  $item->hp),
            'hp_max' => ($personnage->hp_max +  $item->hp),
            'degats_current' => ($personnage->degats_current +  $item->degats),
            'degats_max' => ($personnage->degats_max +  $item->degats),
            'defense_current' => ($personnage->defense_current +  $item->defense),
            'defense_max' => ($personnage->defense_max +  $item->defense),
            'esquive_current' => ($personnage->esquive_current +  $item->esquive),
            'esquive_max' => ($personnage->esquive_max +  $item->esquive),
        ]);

        $inventaire->update([
            'nombre_slot' => ($inventaire->nombre_slot -  1),
            'nombre_item' => ($inventaire->nombre_item +  1),
        ]);

        $inventaire->items()->attach($item);

        $msg = [
            'success' => 'Objet équipé. Vos statistiques viennent d\'être modifiées'
        ];
        return redirect()->back()->with($msg);
    }

    public function lancerCombat()
    {
        $monstre = Monstre::get()->where('name', request('name'))->first();
        // Créé une nouvelle instance du monstre attaqué
        $newMob = new Monstre([
            'name' => $monstre->name,
            'hp' => $monstre->hp,
            'degats' => $monstre->degats,
            'defense' => $monstre->defense,
            'esquive' => $monstre->esquive,
        ]);
        $newMob->save();

        // Récupère le personnage du joueur
        $personnage = Personnage::get()->where('pseudo', request('pseudo'))->first();

        $nbTours = 1;
        $win = false;
        // Boucle du combat, chaque tour le personnage et le monstre se donne 1 coup
        while ($personnage->hp_current > 0 && $newMob->hp > 0 )
        {
            // Si la defense du perso est inférieur aux degats du monstre, le personnage perd la soustraction des dégats du monstre moins sa defense
            if ($personnage->defense_current < $newMob->degats)
            {
                $personnage->update([
                    'hp_current' => $personnage->hp_current - ($newMob->degats - $personnage->defense_current)
                ]);
            }

            // Same
            if ($newMob->defense < $personnage->degats_current)
            {
                $newMob->update([
                    'hp' => $newMob->hp - ($personnage->degats_current - $newMob->defense)
                ]);
            }
            $nbTours++;
        }
        if ($personnage->hp_current <= 0)
        {
            $newMob->delete();
            $msg = [
                'error' => 'Vous avez été vaincu. Votre adversaire a ' . $newMob->hp . '/' . $monstre->hp . ' PV. Il a gagné en ' . $nbTours . ' tours'
            ];
            return redirect()->back()->with($msg);
        }
        elseif ($newMob->hp <= 0)
        {
            $newMob->delete();
            $win = true;
            $msg = [
                'success' => 'Vous avez vaincu votre adversaire. Il vous reste ' . $personnage->hp_current . '/' . $personnage->hp_max . ' PV. Vous avez gagné en ' . $nbTours . ' tours'
            ];
            return redirect()->back()->with($msg);
        }
    }
}
