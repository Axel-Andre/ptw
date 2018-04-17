
@extends('layouts.app')



@section('content')

<script>

let arrival_postalCode = "62000";
let departure_postalCode = "62300";
var latorigine;
var latdestination;

     function initMap() {
       
       
          var geocoder = new google.maps.Geocoder;
          var directionsService = new google.maps.DirectionsService;
          var directionsDisplay = new google.maps.DirectionsRenderer;
          map = new google.maps.Map(document.getElementById('searchmap'), {
              center: {lat: 50.437616, lng: 2.809546},
              zoom: 15
          });
 
            directionsDisplay.setMap(map);       
            
     
          
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
         document.getElementById('departure_check').addEventListener('click', function(latorigine) {
                var departure_place = departure_autocomplete.getPlace();
                for (var i = 0; i < departure_place.address_components.length; i++) {
                  for (var j = 0; j < departure_place.address_components[i].types.length; j++) {
                    if (departure_place.address_components[i].types[j] == "postal_code") {
                         let departure_postalCode = departure_place.address_components[i].long_name;
                         geocodeAddress(geocoder, map, postalCode = departure_postalCode);
                     }
                  }
                }
            latorigine = ' " '+ departure_place.geometry.location.lat() + ", " +  departure_place.geometry.location.lng()+ ' " ';
            document.getElementById('d_address').value = departure_place.name;
            document.getElementById('d_city').value = departure_place.vicinity;
            document.getElementById('d_lat').value =   departure_place.geometry.viewport.f.f;
            document.getElementById('d_long').value =  departure_place.geometry.viewport.b.b;
         });
          
          //RECUPERER LE CODE POSTAL DE L'ADRESSE D'ARRIVEE
         document.getElementById('arrival_check').addEventListener('click', function(latdestination) {
          var arrival_place = arrival_autocomplete.getPlace();
          for (var i = 0; i < arrival_place.address_components.length; i++) {
                  for (var j = 0; j < arrival_place.address_components[i].types.length; j++) {
                    if (arrival_place.address_components[i].types[j] == "postal_code") {
                         let arrival_postalCode = arrival_place.address_components[i].long_name;
                         geocodeAddress(geocoder, map,  postalCode =  arrival_postalCode);
                     }
                  }
                }
        trajectdirection(directionsService, directionsDisplay,arrival_autocomplete, departure_autocomplete );
        latdestination = ' " ' +arrival_place.geometry.location.lat() + ", " + arrival_place.geometry.location.lng()+ ' " ';
            document.getElementById('a_address').value = arrival_place.name;
            document.getElementById('a_city').value = arrival_place.vicinity;
            document.getElementById('a_lat').value =   arrival_place.geometry.viewport.f.f;
            document.getElementById('a_long').value =  arrival_place.geometry.viewport.b.b;
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
     
      
    function trajectdirection(directionsService, directionsDisplay,latorigine, latdestination) {
        directionsService.route({
            origin: latorigine.toString(),
            destination: latdestination.toString(),
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
     
     


     
</script>


<div class="my_trajects">
 <div>
 
    <h2>Mes futures destinations </h2>
    @foreach($trajets as $trajet)
   <div class="traject_view">
        <h3>{{$trajet->startingLocation->city}} - {{$trajet->finalLocation->city}}</h3>
        <p>{{$trajet->startingLocation->address}} - {{$trajet->finalLocation->address}}</p>
        <?php 
        $d = new DateTime($trajet->day);
        setlocale(LC_TIME, "fr_FR"); //only necessary if the locale isn't already se
        date_default_timezone_set('Europe/Paris');
        $formatted_time = strftime("%a %e.%l.%Y", $d->getTimestamp())
        ?>
        <p>{{$formatted_time}}</p>
         <div><i class="fa fa-btn fa-car"></i><p>{{$trajet->places}}</p></div>
         <i>Tags : <a href="#">#{{$trajet->tags->name}}</a></i>
   </div>
    @endforeach

  
      <h2>Je propose un trajet</h2>
    <form action="/addtraject" method="post">
     {{ csrf_field() }}
     <br/>
    
    <label for="departure">Ajouter un lieu de Départ</label>
    <input type="text" name="starting_location"  id="autocomplete_address" required >
     <input type="button" id="departure_check" value="Ajouter ce départ">
    <br/>
     <input type="text" class="none" name="d_address" id="d_address" value="lol" disabled/>
     <input type="text" class="none" name="d_city" id="d_city" value="lol" disabled/>
     <input type="text" class="none" name="d_lat" id="d_lat" value="lol" disabled/>
     <input type="text" class="none" name="d_long" id="d_long" value="lol"disabled />
     <br/>
     
     
    <label for="arrival">Ajouter un lieu d'arrivée</label>
    <input type="text" name="final_location"  id="autocomplete_address2" required >
     <input type="button" id="arrival_check" value="Ajouter cette arrivée">
    <br/>
    <input type="text" class="none" name="a_address" id="a_address" disabled/>
     <input type="text" class="none" name="a_city" id="a_city"disabled/>
     <input type="text" class="none" name="a_lat" id="a_lat"  disabled/>
     <input type="text" class="none" name="a_long" id="a_long"  disabled/>
     <br/>

      <p>C'est un trajet : </p>
    <div>
    <input type="radio" id="regulier"
     name="statut" value="yes" onclick='trajecttype("recurrent")' checked>
    <label for="regulier">Régulier</label>

    <input type="radio" id="ponctuel"
     name="statut" value="no" onclick='trajecttype("ponctuel")'>
    <label for="ponctuel">Ponctuel</label>
     </div>
    <br/>
    
    <div>
    <input type="radio" id="gratuit"
     name="prix" value="Gratuit" checked>
    <label for="gratuit">Gratuit</label>

    <input type="radio" id="payantl"
     name="prix" value="Payant">
    <label for="payant">Payant</label>
    <input type="number" name="price" min="1" />
     </div>
    <br/>
    
    <div>
    Nombres de places disponibles 
    <input type="number" name="places" min="1" max="10" required />
     </div>
    <br/>
    
     <label for="heured">Jour du Trajet</label>
    <input id="date" type="date" name="day" required >
    <br/>
    
    
     <label for="heured">Heure de départ</label>
    <input id="heured" type="time" name="heured" value="08:00" required >
    <br/>
    
    <div id="displayheurer">
     <label for="heurer">Heure de retour</label>
    <input id="heurer" type="time" name="heurer" value="18:30">
    <br/>
    </div>
    
    
    <div id="displaytags">
        <p>Ajouter des tags</p>
   <select name="tag">
        @foreach($tags as $tag)
        <option value="{{$tag->id}}"> {{$tag->name}} </option>
        @endforeach
    </select>
    <!--<br/>
    ou ajouter un tag spécifique
    <input type="text" id="addtag"/>!-->
    </div>
    

    <br/>
    <br/>
    
    <input type="submit" name="submit" id="submit" value="Ajouter ce trajet">
    </form>
</div>    
    
    <div class="map_search" style="height:600px; width:800px;">
     <div id="searchmap" style="height:100%;"></div>
     </div>
</div>
</div>

@endsection
