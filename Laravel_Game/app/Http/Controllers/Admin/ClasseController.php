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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @param Classe $classe
     * @return Response
     */
    public function update(Request $request, Classe $classe)
    {
        $classe->name = $request->name;
        $classe->hp_base = $request->hp_base;
        $classe->hp_max = $request->hp_max;
        $classe->hp_current = $request->hp_current;
        $classe->degat_base = $request->degat_base;
        $classe->degat_max = $request->degat_max;
        $classe->degat_current = $request->degat_current;
        $classe->defense_base = $request->defense_base;
        $classe->defense_max = $request->defense_max;
        $classe->defense_current = $request->defense_current;
        $classe->esquive_base = $request->esquive_base;
        $classe->esquive_max = $request->esquive_max;
        $classe->esquive_current = $request->esquive_current;

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
