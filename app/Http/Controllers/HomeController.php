<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Traject;
// use App\Auth;

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
        return view('home');
    }
    
     public function traject()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('traject',['trajets'=>$user->trajects]);
    }
    
    public function contact()
    {
        return view('contact');
    }
    
    public function profile()
    {
        return view('profile');
    }
   
     public function messages()
    {
        return view('messages');
    }
   

      public function result()
    {
        return view('result');
    }
   
    
}
