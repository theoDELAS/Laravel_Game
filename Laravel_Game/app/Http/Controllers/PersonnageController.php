<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Personnage;
use App\User;
use Illuminate\Http\Request;
use Gate;

class PersonnageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnages = Personnage::latest()->get();

        return view('home', ['personnages' => $personnages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();

        return view ('personnages.create')->with('classes', $classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'pseudo' => 'required',
        ]);

        $personnage = Personnage::create([
            'pseudo' => request('pseudo'),
            'lvl_perso' => 0,
            'histoire_completed' => 0,
        ]);

        $personnage->save();

        $user = User::select('id')->where('name', auth()->user()->name)->first();
        $personnage->user()->attach($user);

        $classe = Classe::select('id')->where('name', request('classe'))->first();
        $personnage->classe()->attach($classe);


        if (Gate::denies('first-users')) {
            return redirect(route('home'));
        }
        $users = User::all();
        return redirect('tuto/tuto1')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
