@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Inscription')
        @endslot
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('Prénom'),
                'type' => 'text',
                'name' => 'firstname',
                'required' => true,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
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
                'title' => __('Mot de passe'),
                'type' => 'password',
                'name' => 'password',
                'required' => true,
                'disabled' => '',
                ])
            @include('partials.form-group', [
                'title' => __('Confirmation du mot de passe'),
                'type' => 'password',
                'name' => 'password_confirmation',
                'required' => true,
                'disabled' => '',
                ])
            @component('components.button')
                @lang('Inscription')
            @endcomponent
        </form>
    @endcomponent
@endsection