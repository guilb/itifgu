@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Modifier un produit')
        @endslot
        <form method="POST" action="{{ route('product.update', $product->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => false,
                'value' => $product->name,
                ])   
            <div class="form-group{{ $errors->has('product') ? ' is-invalid' : '' }}">        

            <div class="form-group">
                <label for="role">Catégorie</label>
                {{ Form::select('category_id', $categories, $product->category_id, array('class' => 'form-control', 'id' => 'category_id')) }}
            </div>
            @include('partials.form-group', [
                'title' => __('Prix'),
                'type' => 'text',
                'name' => 'price',
                'required' => false,
                'value' => $product->price,
                ])   
            @include('partials.form-group', [
                'title' => __('Délai'),
                'type' => 'text',
                'name' => 'delay',
                'required' => false,
                'value' => $product->delay,
                ])    
            @include('partials.form-group', [
                'title' => __('Description (optionnelle)'),
                'type' => 'text',
                'name' => 'description',
                'required' => false,
                'value' => $product->description,
                ])   
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection