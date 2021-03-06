<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Http\Controllers\Controller;
use App\Personnage;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        // retourne ma vue de création de classes
        return view ('admin.classe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function store()
    {
        // ma requete a besoin de ces valeurs pour etre valide
        request()->validate([
            'name' => 'required',
            'hp' => 'required',
            'degats' => 'required',
            'defense' => 'required',
            'esquive' => 'required',
            'histoire' => 'required',
        ]);

        $classe = Classe::create([
           'name' => request('name'),
           'hp' => request('hp'),
           'degats' => request('degats'),
           'defense' => request('defense'),
           'esquive' => request('esquive'),
           'histoire' => request('histoire'),
        ]);

        $classe->save();

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Classe $classe
     * @return Factory|View
     */
    public function show(Classe $classe)
    {
        return view('admin.classe.show')->with([
            'classe' => $classe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Classe $classe
     * @return Factory|View
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
        $classe->hp = $request->hp;
        $classe->degats = $request->degats;
        $classe->defense = $request->defense;
        $classe->esquive = $request->esquive;
        $classe->histoire = $request->histoire;

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
