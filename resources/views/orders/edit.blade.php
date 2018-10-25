@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Créer une commande')
        @endslot
        <form method="POST" action="{{ route('order.update', $order->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group{{ $errors->has('product') ? ' is-invalid' : '' }}">        


            <div class="form-group">
                @include('partials.form-group', [
                    'title' => __('Category'),
                    'type' => 'text',
                    'name' => 'category_id',
                    'value' => $order->category->id,
                    'required' => true,
                ])
                {{ $order->category->name }}
            </div>

            <div class="form-group">
                @include('partials.form-group', [
                    'title' => __('Produit'),
                    'type' => 'text',
                    'name' => 'product_id',
                    'value' => $order->product->id,
                    'required' => true,
                ])
                {{ $order->product->name }}
            </div>

            <div class="form-group">
                @include('partials.form-group', [
                    'title' => __('Parking'),
                    'type' => 'text',
                    'name' => 'parking_id',
                    'value' => $order->parking->id,
                    'required' => true,
                ])
                {{ $order->parking->name }}

            </div>
            <div class="form-group">
                @include('partials.form-group', [
                    'title' => __('Client'),
                    'type' => 'text',
                    'name' => 'user_id',
                    'value' => $order->user->id,
                    'required' => true,
                ])
                {{ $order->user->name }}

            </div>
            @include('partials.form-group', [
                'title' => __('Prix Unitaire'),
                'type' => 'text',
                'name' => 'unit_price',
                'required' => false,
                'value' => $order->unit_price,
                ])   
            <div class="form-group">
                <label for="quantity">@lang('Quantité')</label>
                <select id="quantity" name="quantity" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                </select>
            </div>
            @include('partials.form-group', [
                'title' => __('Prix Total'),
                'type' => 'text',
                'name' => 'total_price',
                'required' => false,
                'value' => $order->total_price,
                ])   
            @include('partials.form-group', [
                'title' => __('Délai'),
                'type' => 'text',
                'name' => 'delay',
                'required' => false,
                'value' => $order->delay,
                ])   
            @include('partials.form-group', [
                'title' => __('Commentaire (optionnel)'),
                'type' => 'text',
                'name' => 'customer_comment',
                'required' => false,
                'value' => $order->customer_comment,
                ])
            @include('partials.form-group', [
                'title' => __('Feedback (optionnel)'),
                'type' => 'text',
                'name' => 'feedback',
                'required' => false,
                'value' => $order->feedback,
                ])   
            @component('components.button')
                @lang('Envoyer')
            @endcomponent

        </form>
    @endcomponent            
@endsection

@section('script')

    <script>

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $( document ).ready(function() {
            console.log( "ready!" );
        });
        $("#product_id").change(function(e) {
            $( "#product_id" ).val();
            console.log("eswd");
            $.ajax({
                url: '/load_product/{id}',
                    type: 'POST',
                    data: {
                        id : $( "#product_id" ).val()
                    },
                        
                dataType: 'JSON',
                    success: function (data) {

                    console.dir(data[0].price);
                    $( "#unit_price" ).val(data[0].price_value);
                    $( "#total_price" ).val($( "#quantity" ).val()*$( "#unit_price" ).val());
                    $( "#delay" ).val(data[0].delay);

                    console.log("eswdddd");
                   //test = jQuery.parseJSON( data );
                   //console.log(e.responseText);
                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }
                });
        });

    </script>
@endsection