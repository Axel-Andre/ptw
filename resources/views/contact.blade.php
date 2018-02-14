
@extends('layouts.app')

@section('content')
   <div class="contact_container">
       <h1>CONTACT</h1>
            <div class="contact_content">
                
                <div class="contact">
                    <ul style="list-style:none;" class="contact_list">
                        <li>
                             16 rue de l'université </br>LENS 62300
                        </li>
                        <li>
                            +33636818635
                        </li>
                        <li>
                           <a href="mailto:contact@pavetheway.fr?Subject=Pave%20the%20way" target="_top" style="text-decoration:none;">contact@pavetheway.fr</a>
                        </li>
                    </ul>
                </div>
                <div id="mapcontact" style="height:768px; width:100%;"></div>
                
            </div>
    </div>
    
    <script>
      
      function initMap() {
        var IUT = {lat: 50.437616, lng: 2.809546};
        var center = {lat: 50.438593, lng: 2.8234};
        var map;
        
        map = new google.maps.Map(document.getElementById('mapcontact'), {
          center: center,
          zoom: 14
        });
        
        var marker = new google.maps.Marker({
          position: IUT,
          map: map,
          title: 'IUT'
        });
        
      }
    </script>
@endsection
