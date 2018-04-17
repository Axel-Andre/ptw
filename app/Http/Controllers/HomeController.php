<?php

namespace App\Http\Controllers;

use App\User;
use App\Location;
use App\Traject;
use App\Tags;
//use App\Talk;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       // $this->middleware('talk');
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
        date_default_timezone_set('Europe/Paris');
        // --- La setlocale() fonctionnne pour strftime mais pas pour DateTime->format()
        setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
        $id = Auth::id();
       $user = User::find(2);
        return view('traject',['trajets'=>$user->trajects],  ['tags' => Tags::all()]);
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
    
    public function addtraject(Request $request) {
             $d = new Location();
             //$d->address = "ok";
             
             $d->city = "ok";
             $d->address = $request->input('a_city');
             $d->lat = 1;
             $d->long = 1;
             $d->save();
             //$d->city = $request->input('a_city');
            // $d->lat = $request->input('a_lat');
             //$d->long = $request->input('a_long');
             //$d->save();
             /*$e = new Location();
             $e->address = $request->input('d_address');
             $e->city = $request->input('d_city');
             $e->lat = $request->input('d_lat');
             $e->long = $request->input('d_long');
             $e->save();*/
            $c = new Traject();
            $c->tags_id = $request->input('tag');
            $c->starting_location = 1;
            $c->final_location = 2;
            $c->regularity = $request->input('statut');
            $c->places = $request->input('places');
            $c->prix = $request->input('price');
            $c->driver_id = Auth::id();
            $c->save();
            
        return redirect('/traject');
    }
    
    public function information(Request $request) {
        $id = Auth::id();
        $profile = \App\User::find($id);

        $profile->name = $request->input('name');
        $profile->surname = $request->input('surname');
        $profile->birthday = $request->input('birthday');
        $profile->phone = $request->input('number');
        $profile->email = $request->input('email');
        $profile->address = $request->input('address');
        
        $profile->save();
        return redirect('/profile/general');
    }
    
}
