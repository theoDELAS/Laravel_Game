<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Http\Controllers\Controller;
use App\Personnage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // retourne ma vue de création de personnage avec comme parametre mes classe stockées dans la variable $classe
        return view ('admin.classe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // ma requete a besoin de ces valeurs pour etre valide
        request()->validate([
            'name' => 'required',
            'hp' => 'required',
            'degat' => 'required',
            'defense' => 'required',
            'esquive' => 'required',
        ]);

        $classe = Classe::create([
           'name' => request('name'),
           'hp_base' => request('hp'),
           'hp_max' => request('hp'),
           'hp_current' => request('hp'),
           'degat_base' => request('degat'),
           'degat_max' => request('degat'),
           'degat_current' => request('degat'),
           'defense_base' => request('defense'),
           'defense_max' => request('defense'),
           'defense_current' => request('defense'),
           'esquive_base' => request('esquive'),
           'esquive_max' => request('esquive'),
           'esquive_current' => request('esquive'),
        ]);

        $classe->save();

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Classe $classe
     * @return Response
     */
    public function edit(Classe $classe)
    {
        return view('admin.classe.edit')->with([
            'classe' => $classe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Classe $classe
     * @return Response
     */
    public function update(Request $request, Classe $classe)
    {
        $classe->name = $request->name;
        $classe->hp_base = $request->hp;
        $classe->hp_max = $request->hp;
        $classe->hp_current = $request->hp;
        $classe->degat_base = $request->degat;
        $classe->degat_max = $request->degat;
        $classe->degat_current = $request->degat;
        $classe->defense_base = $request->defense;
        $classe->defense_max = $request->defense;
        $classe->defense_current = $request->defense;
        $classe->esquive_base = $request->esquive;
        $classe->esquive_max = $request->esquive;
        $classe->esquive_current = $request->esquive;

        $classe->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Classe $classe
     * @return void
     * @throws Exception
     */
    public function destroy(Classe $classe)
    {
        $classe->delete();
        $classe->personnages()->detach();
        $classe->personnages()->delete();

        return redirect()->route('admin.users.index');
    }
}
