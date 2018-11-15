@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Ajouter un produit')
        @endslot
        <form method="POST" action="{{ route('product.store') }}" >
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => false,
                'disabled' => '',
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
            @include('partials.form-group', [
                'title' => __('Prix affiché'),
                'type' => 'text',
                'name' => 'price_display',
                'required' => false,
                'disabled' => '',
                ])  
            @include('partials.form-group', [
                'title' => __('Prix réel'),
                'type' => 'float',
                'name' => 'price_value',
                'required' => false,
                'disabled' => '',
                ])  
            @include('partials.form-group', [
                'title' => __('TVA'),
                'type' => 'float',
                'name' => 'vat',
                'required' => false,
                'disabled' => '',
                ])  
            @include('partials.form-group', [
                'title' => __('Délai'),
                'type' => 'text',
                'name' => 'delay',
                'required' => false,
                'disabled' => '',
                ])   
            @include('partials.form-group', [
                'title' => __('Description (optionnelle)'),
                'type' => 'text',
                'name' => 'description',
                'required' => false,
                'disabled' => '',
                ])   
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection
