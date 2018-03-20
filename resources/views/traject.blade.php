
@extends('layouts.app')



@section('content')

<script>

let arrival_postalCode = "62000";
let departure_postalCode = "62300";
     function initMap() {
       
          var geocoder = new google.maps.Geocoder;
          
          map = new google.maps.Map(document.getElementById('searchmap'), {
              center: {lat: 50.437616, lng: 2.809546},
              zoom: 13
          });
 
          
            //AUTOCOMPLETE
         var departure_input =(document.getElementById('autocomplete_address'));
         var arrival_input =(document.getElementById('autocomplete_address2'));
         var options = {
            types: ['address'],
            componentRestrictions: {country: "fr"}
         }
         var departure_autocomplete = new google.maps.places.Autocomplete(departure_input,options);
         var arrival_autocomplete = new google.maps.places.Autocomplete(arrival_input,options);
         
         //RECUPERER LE CODE POSTAL DE L'ADRESSE DE DEPART
         document.getElementById('departure_check').addEventListener('click', function() {
                var departure_place = departure_autocomplete.getPlace();
                for (var i = 0; i < departure_place.address_components.length; i++) {
                  for (var j = 0; j < departure_place.address_components[i].types.length; j++) {
                    if (departure_place.address_components[i].types[j] == "postal_code") {
                         let departure_postalCode = departure_place.address_components[i].long_name;
                         geocodeAddress(geocoder, map, postalCode = departure_postalCode);
                     }
                  }
                }
          });
          
          //RECUPERER LE CODE POSTAL DE L'ADRESSE D'ARRIVEE
         document.getElementById('arrival_check').addEventListener('click', function() {
          var arrival_place = arrival_autocomplete.getPlace();
          for (var i = 0; i < arrival_place.address_components.length; i++) {
                  for (var j = 0; j < arrival_place.address_components[i].types.length; j++) {
                    if (arrival_place.address_components[i].types[j] == "postal_code") {
                         let arrival_postalCode = arrival_place.address_components[i].long_name;
                         geocodeAddress(geocoder, map,  postalCode =  arrival_postalCode);
                     }
                  }
                }
          });
          
      }
      //FIN INITMAP
      
      
      //PUT THE START MARKER AND END WITH RESTRICTIONS
        function geocodeAddress(geocoder, map, postalCode) {
              geocoder.geocode({
                componentRestrictions: {
                  country: 'FR',
                  postalCode: postalCode
                }
              }, function(results, status) {
                if (status === 'OK') {
                  map.setCenter(results[0].geometry.location);
                  new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                  });
                } else {
                  window.alert('Geocode was not successful for the following reason: ' +
                      status);
                }
              });
     }
     
   
     
</script>


<div class="my_trajects">
 <div>
 
    <h2>Mes trajets </h2>
    @foreach($trajets as $trajet)
    <pre>
        <!--{{var_dump($trajet)}}-->
        {{$trajet->startingLocation->city}}
        {{$trajet->finalLocation->city}}
    </pre>
    @endforeach
    <div class="traject_view">
    <h3>Lens - Bethune</h3>
    <p>Samedi 23 Avril 15h</p>
    </div>
     
      <h2>Ajouter un trajet</h2>
    <form action="#">
     {{ csrf_field() }}
     <br/>
    <label for="departure">Lieu de Départ</label>
    <input type="text" name="departure"  id="autocomplete_address">
     <input type="button" id="departure_check" value="Ajouter ce départ">
     
    <br/>
    
    <label for="arrival">Lieu d'Arrivée</label>
    <input type="text" name="arrival"  id="autocomplete_address2">
     <input type="button" id="arrival_check" value="Ajouter cette arrivée" >
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
    
    <div>
    <input type="radio" id="gratuit"
     name="prix" value="Gratuit">
    <label for="gratuit">Gratuit</label>

    <input type="radio" id="payantl"
     name="prix" value="Ponctuel">
    <label for="payant">Payant</label>
     </div>
    <br/>
    
    <div>
    <select>
     <option>Supermarché</option>
     <option>Restaurant</option>
     <option>Cinéma</option>
     <option>Loisirs</option>
    </select>
    <br/>
    ou ajouter un tag spécifique
    <input type="text" id="addtag"/>
    </div>
    

    <br/>
    
    <input type="submit" name="submit" id="submit" value="Ajouter ce trajet">
    </form>
</div>    
    
    <div class="map_search" style="height:600px; width:800px;">
     <div id="searchmap" style="height:100%;"></div>
     </div>
</div>


@endsection
