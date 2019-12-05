@section('css')
<style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 70%;
        height: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
        overflow: scroll;
        height: 174px;
      }
    </style>
@endsection


@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Liste des distances')

        @endslot


        <div id="map-container" style="width:100%;height:400px; ">
            <div style="width: 100%; height: 100%" id="map"></div>
        </div>   
    <div id="totals-panel"></div>

<div id="right-panel">
    {{ Form::select('start', $places, $itinerary->start_id, array('class' => 'form-control', 'id' => 'start')) }}
    <select id="itinerary">
        @foreach($itineraries as $itinerary) 
          <option value="{{ $itinerary->places }}">{{ $itinerary->name }}</option>
        @endforeach

    </select>
    <select id="end">
        @foreach($places as $place) 
          <option value="{{ $place->lat }},{{ $place->lng }}">{{ $place->name }}</option>
        @endforeach

    </select>
    <div>
      <input type="submit" id="submit">
    </div>
    <div id="directions-panel"></div>
    </div>
<script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: {lat: -21.2, lng: 55.5}
        });
        directionsRenderer.setMap(map);

            @foreach($places as $place) 
                var place{{ $place->id }} = new google.maps.LatLng({{ $place->lat }},{{ $place->lng }});
            @endforeach


        document.getElementById('submit').addEventListener('click', function() {
          var itinerary = document.getElementById('itinerary').value;

          var steps = eval(itinerary);
          //var steps = [{lat: -21, lng: 55.5},{lat: -21.4, lng: 55.5}];
          //alert(steps);
          calculateAndDisplayRoute(directionsService, directionsRenderer,steps);
          //var steps = [place6,place9];
          //calculateAndDisplayRoute(directionsService, directionsRenderer,start,place19,steps);

        });


        var locations = [
            @foreach($places as $place)
              ['{{ $place->name }}', '{{ $place->lat }}', '{{ $place->lng }}', '{{ $place->id }}'],
            @endforeach

        ];

    var infowindow = new google.maps.InfoWindow();

                    var marker, i;

                    for (i = 0; i < locations.length; i++) {  
                      marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map
                      });

                      google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                          infowindow.setContent(locations[i][0]);
                          infowindow.open(map, marker);
                        }
                      })(marker, i));
                    }
      }




      function calculateAndDisplayRoute(directionsService, directionsRenderer,steps) {
        var waypts = [];

        for (var i = 0; i < steps.length; i++) {
            waypts.push({
              location: steps[i],
              stopover: true
            });
        }
        var start = document.getElementById('start').value
        var end = document.getElementById('end').value
        directionsService.route({
          origin: start,
          destination: end,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING',
        }, function(response, status) {
          if (status === 'OK') {


            directionsRenderer.setDirections(response);
            console.log(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            console.log(route);
            var route_duration = 0;
            var route_distance = 0;
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
              summaryPanel.innerHTML += route.legs[i].duration.text + '<br><br>';
              route_distance += parseInt(route.legs[i].distance.value);
              route_duration += parseInt(route.legs[i].duration.value);
            }
            var totalsPannel = document.getElementById('totals-panel');
              totalsPannel.innerHTML = '';
              totalsPannel.innerHTML += route_distance/1000 + " km <br/>";
              totalsPannel.innerHTML += route_duration/60 + " min";
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });






      }
    </script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"
    async defer></script>

    @endcomponent
@endsection
