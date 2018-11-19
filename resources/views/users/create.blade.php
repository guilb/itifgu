@extends('layouts.form')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Modifer le profil')
        @endslot
        <form method="POST" action="{{ route('user.store') }}" >
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'name',
                'name' => 'name',
                'required' => true,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Adresse postale'),
                'type' => 'address',
                'name' => 'address',
                'required' => true,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Code Postal'),
                'type' => 'zipcode',
                'name' => 'zipcode',
                'required' => true,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Ville'),
                'type' => 'city',
                'name' => 'city',
                'required' => true,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Pays'),
                'type' => 'country',
                'name' => 'country',
                'required' => true,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Téléphone'),
                'type' => 'phone',
                'name' => 'phone',
                'required' => true,
                'disabled' => '',
                ])
            <div class="form-row">
              <div class="col-md-3">
                <label for="role">Parking</label>
              </div>
              <div class="col-md-3">
                {{ Form::select('parking_id', $parkings,'', array('class' => 'form-control', 'id' => 'parking_id')) }}
              </div>
           </div>
            <div class="form-row">
              <div class="col-md-3">
                <label for="role">Rôle</label>
              </div>
              <div class="col-md-3">
                {{ Form::select('role', array('admin' => 'Admin', 'user' => 'User'), 'user', array('class' => 'form-control', 'id' => 'role')) }}
              </div>
            </div>
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent
@endsection
