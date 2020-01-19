<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

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
     * @return Renderable
     */
    public function index()
    {
        if (Gate::denies('basic-users')) {
            if (Gate::denies('admin-users')) {
                return redirect(route('presentation'));
            }
            return redirect(route('admin.users.index'));
        }

        $user = User::find(auth()->user()->id);
        return view('home', ['user' => $user]);
    }

    /**
     * @param User $user
     * @return Factory|View
     */
    public function choixHistoire(User $user)
    {
        return view('home');
    }
}
