@extends('layouts.app')

@section('content') 
<div>
 <a href="/profile" > Profil</a>
 <a href="/messages" >Messages</a>
</div>
<!--<div>-->
<!--  <h2> Bienvenue sur votre profil</h2> <h1>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h1> -->
<!-- <p>Votre numéro de téléphone est le suivant : {{ Auth::user()-> phone}} </p>-->
<!-- <p>Votre adresse est la suivante : {{ Auth::user()->address}}</p>-->
<!-- <p>Votre e-mail est le suivant : {{ Auth::user()-> email}}</p>-->
<!--</div>-->

<div class="profil_infos">
 <div class="oh">
  <p>Téléphone</p>
  <p>adresse</p>
  <p>e-mail</p>
 </div>
 <div>
  <p>{{ Auth::user()-> phone}}</p>
  <p>{{ Auth::user()-> address}}</p>
  <p>{{ Auth::user()-> email}}</p>
 </div>
</div>


 
 @endsection