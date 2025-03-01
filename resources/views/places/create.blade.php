<style>
/* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
#map {
  height: 100%;
}
/* Optional: Makes the sample page fill the window. */
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<style>
  #locationField, #controls {
    position: relative;
    width: 480px;
  }
  #autocomplete {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 99%;
  }
  .label {
    text-align: right;
    font-weight: bold;
    width: 100px;
    color: #303030;
    font-family: "Roboto";
  }
  #address {
    border: 1px solid #000090;
    background-color: #f0f9ff;
    width: 480px;
    padding-right: 2px;
  }
  #address td {
    font-size: 10pt;
  }
  .field {
    width: 99%;
  }
  .slimField {
    width: 80px;
  }
  .wideField {
    width: 200px;
  }
  #locationField {
    height: 20px;
    margin-bottom: 2px;
  }
</style>
@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Ajouter un produit')
        @endslot
        <form id="create_form" method="POST" action="{{ route('place.store') }}" >
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => false,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Adresse'),
                'type' => 'text',
                'name' => 'address',
                'required' => false,
                'disabled' => '',
                ])
               @include('partials.form-group', [
                'title' => __('lat'),
                'type' => 'text',
                'name' => 'lat',
                'required' => false,
                'disabled' => '',
                ])
               @include('partials.form-group', [
                'title' => __('lng'),
                'type' => 'text',
                'name' => 'lng',
                'required' => false,
                'disabled' => '',
                ])
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
        <table name="list" id="list">
            <tr>
                <td>name</td>
                <td>lng</td>
                <td>lat</td>
                <td></td>
            </tr>
        </table>
        <div id="locationField">
  <input id="autocomplete"
         placeholder="Enter your address"
         onFocus="geolocate()"
         type="text"/>
</div>

<!-- Note: The address components in this sample are typical. You might need to adjust them for
           the locations relevant to your app. For more information, see
     https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
-->

<table id="address">
  <tr>
    <td class="label">Street address</td>
    <td class="slimField"><input class="field" id="street_number" disabled="true"/></td>
    <td class="wideField" colspan="2"><input class="field" id="route" disabled="true"/></td>
  </tr>
  <tr>
    <td class="label">City</td>
    <td class="wideField" colspan="3"><input class="field" id="locality" disabled="true"/></td>
  </tr>
  <tr>
    <td class="label">State</td>
    <td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true"/></td>
    <td class="label">Zip code</td>
    <td class="wideField"><input class="field" id="postal_code" disabled="true"/></td>
  </tr>
  <tr>
    <td class="label">Country</td>
    <td class="wideField" colspan="3"><input class="field" id="country" disabled="true"/></td>
  </tr>
</table>
    @endcomponent
@endsection


@section('script')

    <script>

        $("#name").change(function(e) {
            var place = $('#name').val();
            //alert(place);
            $.get('https://api.openrouteservice.org/geocode/autocomplete?api_key=5b3ce3597851110001cf62488fa4a992f11f4aeeb62850c3649de8c3&size=20&text='+place, function( data, status ) {

                
                $( data["features"] ).each(function( index ) {
                    //alert(index+ " - "+this["properties"]["label"]+", "+this["geometry"]["coordinates"][0]+", "+this["geometry"]["coordinates"][1]);
                    var lat = this["geometry"]["coordinates"][1]
                    var lng = this["geometry"]["coordinates"][0]
                    var name = this["properties"]["label"]
                    name = name.replace(",", "");

                    $('#list tr:last').after('<tr><td>'+name+'</td><td>'+lat+'</td><td>'+lng+'</td><td><a href="javascript:DoPost(\''+name+'\','+lat+','+lng+')">Click Here</A></td></tr>');
                });

            });

        });

// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component','geometry']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
//alert(autocomplete.getPlace().geometry.location.lat());

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }
  //alert(document.getElementById('autocomplete').value);
  console.log(place);

  var test = "";
  var this_address = "";
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
      this_address += val+', ';
    }
  }


        $( "#lat" ).val(autocomplete.getPlace().geometry.location.lat());
        $( "#lng" ).val(autocomplete.getPlace().geometry.location.lng());
        $( "#name" ).val(document.getElementById('autocomplete').value);
        $( "#address" ).val(this_address);
        $( "#create_form" ).submit();
  //alert(test);




  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.

}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}


   function DoPost(name,lat,lng){
        $( "#lat" ).val(lat);
        $( "#lng" ).val(lng);
        $( "#name" ).val(name);
        $( "#create_form" ).submit();
    };
                    
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete"
        async defer></script>


@endsection
