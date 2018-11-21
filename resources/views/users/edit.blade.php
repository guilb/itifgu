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
                'title' => __('Nom'),
                'type' => 'name',
                'name' => 'name',
                'required' => true,
                'disabled' => '',
                'value' => $user->name,
                ])
            @include('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                'disabled' => '',
                'value' => $user->email,
                ])
            @include('partials.form-group', [
                'title' => __('Adresse postale'),
                'type' => 'address',
                'name' => 'address',
                'required' => true,
                'disabled' => '',
                'value' => $user->address,
                ])
            @include('partials.form-group', [
                'title' => __('Code Postal'),
                'type' => 'zipcode',
                'name' => 'zipcode',
                'required' => true,
                'disabled' => '',
                'value' => $user->zipcode,
                ])
            @include('partials.form-group', [
                'title' => __('Ville'),
                'type' => 'city',
                'name' => 'city',
                'required' => true,
                'disabled' => '',
                'value' => $user->city,
                ])
            @include('partials.form-group', [
                'title' => __('Pays'),
                'type' => 'country',
                'name' => 'country',
                'required' => true,
                'disabled' => '',
                'value' => $user->country,
                ])
            @include('partials.form-group', [
                'title' => __('Téléphone'),
                'type' => 'phone',
                'name' => 'phone',
                'required' => true,
                'disabled' => '',
                'value' => $user->phone,
                ])
            @admin
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="role">Parking</label>
                  </div>
                  <div class="col-md-3">
                    {{ Form::select('parking_id', $parkings, $user->parking_id, array('class' => 'form-control', 'id' => 'parking_id')) }}
                  </div>
               </div>
            @else
                <span>Parking</span>
                <span>{{ $user->parking->name }}</span>
                <input class="form-control" id="parking_id" type="hidden" name="parking_id" value="{{ $user->parking_id }}">
            @endadmin
            @admin
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="role">Rôle</label>
                    {{ $user->role }}
                  </div>
                  <div class="col-md-3">
                    {{ Form::select('role', array('admin' => 'Admin', 'user' => 'User'), $user->role, array('class' => 'form-control', 'id' => 'role')) }}
                  </div>
                </div>
            @else
                <input class="form-control" id="role" type="hidden" name="role" value="{{ $user->role }}">
            @endadmin
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent
@endsection
