<?php

namespace App\Http\Controllers;

use App\User;
use Gate;
use Illuminate\Http\Request;

class TutoController extends Controller
{
    public function index()
    {
        if (Gate::denies('first-users')) {
            if (Gate::denies('admin-users')) {
                return redirect(route('home'));
            }
            return redirect(route('admin.users.index'));
        }

        $users = User::all();
        return view('tuto.introduction')->with('users', $users);
    }

    public function passerTuto() {
        //
    }
}
