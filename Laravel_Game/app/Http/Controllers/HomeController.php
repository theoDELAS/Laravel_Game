<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function presentation()
    {

        return view('presentation')->with([
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::denies('basic-users')) {
            if (Gate::denies('admin-users')) {
                return redirect(route('introduction'));
            }
            return redirect(route('admin.users.index'));
        }

        $user = User::find(auth()->user()->id);
        return view('home', ['user' => $user]);
    }
}
