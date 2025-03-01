@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Modifier un produit')
        @endslot
        <form method="POST" action="{{ route('product.update', $product->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group{{ $errors->has('product') ? ' is-invalid' : '' }}">

            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => false,
                'disabled' => '',
                'value' => $product->name,
                ])

            <div class="form-row">
                <div class="col-md-3">
                  <label for="role">Catégorie</label>
                </div>
                <div class="col-md-6">
                  {{ Form::select('category_id', $categories, $product->category_id, array('class' => 'form-control', 'id' => 'category_id')) }}
                </div>
            </div>
            @include('partials.form-group', [
                'title' => __('Prix affiché'),
                'type' => 'text',
                'name' => 'price_display',
                'required' => false,
                'disabled' => '',
                'value' => $product->price_display,
                ])
            @include('partials.form-group', [
                'title' => __('Prix réel'),
                'type' => 'float',
                'name' => 'price_value',
                'required' => false,
                'disabled' => '',
                'value' => $product->price_value,
                ])
            @include('partials.form-group', [
                'title' => __('TVA'),
                'type' => 'float',
                'name' => 'vat',
                'required' => false,
                'disabled' => '',
                'value' => $product->vat,
                ])
            @include('partials.form-group', [
                'title' => __('Délai'),
                'type' => 'text',
                'name' => 'delay',
                'required' => false,
                'disabled' => '',
                'value' => $product->delay,
                ])
            @include('partials.form-group', [
                'title' => __('Description (optionnelle)'),
                'type' => 'text',
                'name' => 'description',
                'required' => false,
                'disabled' => '',
                'value' => $product->description,
                ])
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
          </div>
        </form>
    @endcomponent
@endsection
