<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Monstre;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class MonstresController extends Controller
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
     * @return Factory|View
     */
    public function create()
    {
        // retourne ma vue de création de monstres
        return view ('admin.monstres.create');
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
        ]);

        $monstre = Monstre::create([
            'name' => request('name'),
            'hp' => request('hp'),
            'degats' => request('degats'),
            'defense' => request('defense'),
            'esquive' => request('esquive'),
        ]);
        $monstre->save();

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Monstre $monstre
     * @return Factory|View
     */
    public function show(Monstre $monstre)
    {
        return view('admin.monstres.show')->with([
            'monstre' => $monstre,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Monstre $monstre
     * @return Factory|View
     */
    public function edit(Monstre $monstre)
    {
        return view('admin.monstres.edit')->with([
            'monstre' => $monstre,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Monstre $monstre
     * @return RedirectResponse
     */
    public function update(Request $request, Monstre $monstre)
    {
        $monstre->name = $request->name;
        $monstre->hp = $request->hp;
        $monstre->degats = $request->degats;
        $monstre->defense = $request->defense;
        $monstre->esquive = $request->esquive;

        $monstre->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Monstre $monstre
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Monstre $monstre)
    {
        $monstre->delete();

        return redirect()->route('admin.users.index');
    }
}
