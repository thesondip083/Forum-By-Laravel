<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Programming;
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

       // return Programming::all();
        return view('home')->with('user',Auth::user());

    }
}
