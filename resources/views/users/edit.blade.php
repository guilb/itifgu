@extends('layouts.form')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Modifer le profil')
        @endslot
        <form method="POST" action="{{ route('profile.update', $user->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                'value' => $user->email,
                ])
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form> 
    @endcomponent            
@endsection
