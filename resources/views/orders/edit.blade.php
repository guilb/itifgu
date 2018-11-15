@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Modifier une commande')
        @endslot
        <form method="POST" action="{{ route('order.update', $order->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group{{ $errors->has('product') ? ' is-invalid' : '' }}">


            <div class="form-group">
                @include('partials.form-group', [
                    'title' => __('Categorie'),
                    'type' => 'hidden',
                    'name' => 'category_id',
                    'value' => $order->category->id,
                    'required' => true,
                    'disabled' => '',
                ])
                {{ $order->category->name }}
            </div>

            <div class="form-group">
                @include('partials.form-group', [
                    'title' => __('Produit'),
                    'type' => 'hidden',
                    'name' => 'product_id',
                    'value' => $order->product->id,
                    'required' => true,
                    'disabled' => '',
                ])
                {{ $order->product->name }}
            </div>

            <div class="form-group">
                @include('partials.form-group', [
                    'title' => __('Parking'),
                    'type' => 'hidden',
                    'name' => 'parking_id',
                    'value' => $order->parking->id,
                    'required' => true,
                    'disabled' => '',
                ])
                {{ $order->parking->name }}

            </div>
            <div class="form-group">
                @include('partials.form-group', [
                    'title' => __('Client'),
                    'type' => 'hidden',
                    'name' => 'user_id',
                    'value' => $order->user->id,
                    'required' => true,
                    'disabled' => '',
                ])
                {{ $order->user->name }}

            </div>
            @include('partials.form-group', [
                'title' => __('Prix Unitaire'),
                'type' => 'hidden',
                'name' => 'unit_price',
                'required' => false,
                'value' => $order->unit_price,
                'disabled' => '',
                ])
                {{ $order->unit_price }}

            @include('partials.form-group', [
                'title' => __('Quantité'),
                'type' => 'hidden',
                'name' => 'quantity',
                'required' => false,
                'value' => $order->quantity,
                'disabled' => '',
                ])
                {{ $order->quantity }}
            <span>Prix total : </span>
            <span id="total_price-label">{{ $order->total_price }} €</span>
            <input class="form-control"  id="total_price" type="text" class="form-control" name="total_price" value="{{ $order->total_price }}" >

            <span>Taux de TVA (%) : </span>
            <span id="vat-label">{{ $order->vat }} %</span>
            <input class="form-control"  id="vat" type="text" class="form-control" name="vat" value="{{ $order->vat }}" >



            @include('partials.form-group', [
                'title' => __('Délai'),
                'type' => 'text',
                'name' => 'delay',
                'required' => false,
                'value' => $order->delay,
                'disabled' => '',
                ])
            <div class="form-group">
                Commentaire : {{ $order->customer_comment }}
            </div>
            @include('partials.form-group', [
                'title' => __('Feedback (optionnel)'),
                'type' => 'text',
                'name' => 'feedback',
                'required' => false,
                'value' => $order->feedback,
                'disabled' => '',
                ])

            @include('partials.form-group', [
                'title' => __('Statut'),
                'type' => 'text',
                'name' => 'status',
                'required' => false,
                'value' => 'waiting',
                'disabled' => '',
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
                    $( "#total_price-label" ).html(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2)+" €");

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
