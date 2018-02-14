
@extends('layouts.app')

@section('content')
   <div class="testmap_container" style="height:600px; width:800px;">
            <div id="map" style="height:100%;"></div>
    <script>
      var map;
      function initMap() {
        var IUT = {lat: 50.437616, lng: 2.809546};
        var VIPCLUB = {lat: 50.43848089999999, lng: 2.8117306999999983};
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: IUT,
          zoom: 17
        });
        
        var marker = new google.maps.Marker({
          position: IUT,
          map: map,
          title: 'IUT'
        });
        
         var marker = new google.maps.Marker({
          position: VIPCLUB,
          map: map,
          title: 'vipclub'
        });
        
        
        
      }
    </script>
    </div>
@endsection
