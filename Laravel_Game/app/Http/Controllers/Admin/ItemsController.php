<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // retourne ma vue de création d'item
        return view ('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ma requete a besoin de ces valeurs pour etre valide

        request()->validate([
            'name' => 'required',
            'hp' => 'required',
            'degats' => 'required',
            'defense' => 'required',
            'esquive' => 'required',
        ]);

        $item = Item::create([
            'name' => request('name'),
            'quantite' => request('quantite'),
            'hp' => request('hp'),
            'degats' => request('degats'),
            'defense' => request('defense'),
            'esquive' => request('esquive'),
        ]);
        $item->save();

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return Factory|View
     */
    public function show(Item $item)
    {
        return view('admin.items.show')->with([
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return Factory|View
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit')->with([
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Item $item
     * @return RedirectResponse
     */
    public function update(Request $request, Item $item)
    {
        $item->name = $request->name;
        $item->quantite = $request->quantite;
        $item->hp = $request->hp;
        $item->degats = $request->degats;
        $item->defense = $request->defense;
        $item->esquive = $request->esquive;

        $item->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Item $item)
    {
        $item->delete();
        $item->inventaire()->detach();

        return redirect()->route('admin.users.index');
    }
}
