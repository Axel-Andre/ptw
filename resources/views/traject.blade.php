
@extends('layouts.app')

@section('content')
<div>
    <form method="post" action="#" >
    <h2>Ajouter un trajet régulier</h2>
     <br/>
    <label for="departure">Lieu de Départ</label>
    <input type="text" name="departure" id="departure">
    <br/>
    
    <label for="arrival">Lieu d'Arrivée</label>
    <input type="text" name="arrival" id="arrival">
    <br/>
    
     <label for="heured">Heure de départ</label>
    <input id="heured" type="time" name="heured" value="08:00">
    <br/>
    
     <label for="heurer">Heure de retour</label>
    <input id="heurer" type="time" name="heurer" value="18:30">
    <br/>
    
    <p>C'est un trajet : </p>
    <div>
    <input type="radio" id="regulier"
     name="statut" value="Régulier">
    <label for="regulier">Régulier</label>

    <input type="radio" id="ponctuel"
     name="statut" value="Ponctuel">
    <label for="ponctuel">Ponctuel</label>


  </div>

    <br/>
    
    <input type="submit" name="submit" value="Ajouter ce trajet">
    
    
    
    </form>
</div>

@endsection
