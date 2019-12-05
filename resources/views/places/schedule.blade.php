@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Liste des distances')

        @endslot

        <table class="table table-light">
            <tbody>
                @foreach($distances as $distance)
                    <tr>
                        <td>{{ $distance->place_1->name }}</td>
                        <td>{{ $distance->place_2->name }}</td>
                        <td>{{ number_format((float)$distance->distance/1000, 2, ',', '') }} km</td>
                        <td>{{ number_format((float)$distance->duration/60, 0, ',', '') }} min</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
       
    @endcomponent
@endsection
