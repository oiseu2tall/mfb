<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use Auth;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $users = User::all()->where('id','!=', Auth::user()->id);
        $mygroups = Group::all()->where('user_id', Auth::user()->id);
        return view('home', compact('mygroups'), compact('users'));

    }
}
