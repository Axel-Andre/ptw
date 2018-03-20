<?php

namespace App\Http\Controllers;

use App\Traject;
use App\Http\Requests;
use Illuminate\Http\Request;

class MyController extends Controller
{   
   
     public function lol() {
        return view("result", ["trajets" => Traject::all()]);
    }
} 
