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
        <form method="POST" action="{{ route('place.update', $place->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => false,
                'disabled' => '',
                'value' => $place->name,

                ])
            @include('partials.form-group', [
                'title' => __('Adresse'),
                'type' => 'text',
                'name' => 'address',
                'required' => false,
                'disabled' => '',
                'value' => $place->address,
                ])
               @include('partials.form-group', [
                'title' => __('lat'),
                'type' => 'text',
                'name' => 'lat',
                'required' => false,
                'disabled' => '',
                'value' => $place->lat,
                ])
               @include('partials.form-group', [
                'title' => __('lng'),
                'type' => 'text',
                'name' => 'lng',
                'required' => false,
                'disabled' => '',
                'value' => $place->lng,
                ])
               @include('partials.form-group', [
                'title' => __('itinerary_id'),
                'type' => 'text',
                'name' => 'itinerary_id',
                'required' => false,
                'disabled' => '',
                'value' => $place->itinerary_id,
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


<!-- Note: The address components in this sample are typical. You might need to adjust them for
           the locations relevant to your app. For more information, see
     https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
-->



@endsection
