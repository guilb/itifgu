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
                'value' => $user->name,
                ])
            @include('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                'value' => $user->email,
                ])
            <div class="form-group">
                <label for="role">Rôle</label>
                {{ $user->role }}
                {{ Form::select('role', array('admin' => 'Admin', 'user' => 'User'), $user->role, array('class' => 'form-control', 'id' => 'role')) }}
            </div>
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form> 
    @endcomponent            
@endsection
