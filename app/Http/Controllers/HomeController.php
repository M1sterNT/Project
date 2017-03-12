<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userr = DB::table('users')->where('id', Auth::id())->first();
        if($userr->role == "ADMIN"){
            return view('admin.admin');
        }elseif ($userr->role == "STUDENT"){
            return view('homeS');
        }else{
            return view('home');
        }

    }
}
