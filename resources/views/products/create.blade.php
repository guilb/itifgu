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
                'title' => __('Prix'),
                'type' => 'text',
                'name' => 'price',
                'required' => false,
                ])   
            @include('partials.form-group', [
                'title' => __('Délai'),
                'type' => 'text',
                'name' => 'delay',
                'required' => false,
                ])   
            @include('partials.form-group', [
                'title' => __('Description (optionnelle)'),
                'type' => 'text',
                'name' => 'description',
                'required' => false,
                ])   
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection
@section('script')
    <script>
        $(function() {
            $('input[type="file"]').on('change',function(){
              let fileName = $(this).val().replace(/^.*[\\\/]/, '')
              $(this).next('.form-control-file').html(fileName)
            })
        })
    </script>
@endsection