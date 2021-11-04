<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
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
        $rate=Rate::all();
        return view('home.index')->with('rate',$rate);
    }
}
