@extends('layouts.app')

@section('content') 
<div>
 
 <h1>Bienvenue sur votre profil {{ Auth::user()-> name}}</h1>
 <a href="/profile/general" > Profil</a>
 <a href="/messages" >Messages</a>
</div>
<div class="profil_container">
<form class="profil_infos">
   
   <label for="surname">Nom</label>
    <input type="text" id="surname" name="surname" value="{{ Auth::user()-> surname}}" /> 
  
   <label for="name">Prénom</label>
   <input type="text" id="name" name="name" value="{{ Auth::user()-> name}}" /> 
   
   
   <label for="birthday">Date de naissance</label>
    <input type="date" name="surname" value="{{ Auth::user()-> birthday}}" /> 
  
   <label>Téléphone</label>
   <p>++33 {{ Auth::user()-> phone}}</p>

   <label>Adresse</label>
   <p>{{ Auth::user()-> address}}</p>
  
   <label>e-mail</label>
   <input type="email" id="profil_name" name="email" value="{{ Auth::user()-> email}}" /> 
   
   <p></p>
 <input type="submit" value="modifier informations">
 </form>
  
</div>



 
 @endsection