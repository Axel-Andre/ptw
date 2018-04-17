@extends('layouts.app')

@section('content') 
<div>
 
 <h1>Bienvenue sur votre profil {{ Auth::user()-> name}}</h1>
 <a href="/profile/general" > Profil</a>
 <a href="/messages" >Messages</a>
</div>
<div class="profil_container">
<form class="profil_infos" method="post" action="/information">
     {{ csrf_field() }}
   <label for="surname">Nom</label>
    <input type="text" id="surname" name="surname" value="{{ Auth::user()-> surname}}" /> 
  
   <label for="name">Prénom</label>
   <input type="text" id="name" name="name" value="{{ Auth::user()-> name}}" /> 
   
   
   <label for="birthday">Date de naissance</label>
    <input type="date" name="birthday" value="{{ Auth::user()-> birthday}}" /> 
  
   <label>Téléphone</label>
   <input type="number" name="number" value="{{ Auth::user()-> phone}}"/>

   <label>Adresse</label>
   <input type="text" name="address" value="{{ Auth::user()-> address}}"/>
  
  
   <label>e-mail</label>
   <input type="email" id="profil_name" name="email" value="{{ Auth::user()-> email}}" /> 
   
   <p></p>
 <button id="profile_submit" type="submit" value="modifier informations">modifier informations</button>
 </form>
  
</div>



 
 @endsection