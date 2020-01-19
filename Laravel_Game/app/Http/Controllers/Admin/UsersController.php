<?php

namespace App\Http\Controllers\Admin;

use App\Classe;
use App\Http\Controllers\Controller;
use App\Item;
use App\Monstre;
use App\Personnage;
use App\User;
use App\Role;
use Exception;
use Gate;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse|Redirector
     */
    public function index()
    {
        if (Gate::denies('admin-users')) {
            if (Gate::denies('basic-users')) {
                return redirect(route('presentation'));
            }
            return redirect(route('home'));
        }

        $users = User::all();
        $classes = Classe::all();
        $monstres = Monstre::all();
        $items = Item::all();
        return view('admin.users.index')->with([
            'users' => $users,
            'classes' => $classes,
            'monstres' => $monstres,
            'items' => $items,
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.show')->with([
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        if (Gate::denies('admin-users')) {
            return redirect(route('admin.users.index'));
        }
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if (Gate::denies('admin-users')) {
            return redirect(route('admin.users.index'));
        }
        $user->roles()->detach();
        $user->personnages()->detach();

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
