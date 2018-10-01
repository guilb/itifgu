@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Créer une commande')
        @endslot
        <form method="POST" action="{{ route('order.store') }}" >
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => false,
                ])   
            <div class="form-group{{ $errors->has('product') ? ' is-invalid' : '' }}">        

            <div class="form-group">
                <label for="category_id">@lang('Catégorie')</label>
                <select id="category_id" name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product_id">@lang('Produit')</label>
                <select id="product_id" name="product_id" class="form-control">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="parking_id">@lang('Parking')</label>
                <select id="parking_id" name="parking_id" class="form-control">
                    @foreach($parkings as $parking)
                        <option value="{{ $parking->id }}">{{ $parking->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">@lang('Client')</label>
                <select id="user_id" name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            @include('partials.form-group', [
                'title' => __('Prix Unitaire'),
                'type' => 'text',
                'name' => 'unit_price',
                'required' => false,
                ])   
            @include('partials.form-group', [
                'title' => __('Quantité'),
                'type' => 'text',
                'name' => 'quantity',
                'required' => false,
                ])
            @include('partials.form-group', [
                'title' => __('Prix Total'),
                'type' => 'text',
                'name' => 'total_price',
                'required' => false,
                ])   
            @include('partials.form-group', [
                'title' => __('Délai'),
                'type' => 'text',
                'name' => 'delay',
                'required' => false,
                ])   
            @include('partials.form-group', [
                'title' => __('Commentaire (optionnel)'),
                'type' => 'text',
                'name' => 'comment',
                'required' => false,
                ])
            @include('partials.form-group', [
                'title' => __('Feedback (optionnel)'),
                'type' => 'text',
                'name' => 'feedback',
                'required' => false,
                ])   
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection
