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

            <div>
                <span>Parking</span>
                <span>{{ $order->parking_name }}</span>
                <input class="form-control" id="parking_id" type="hidden" name="parking_id" value="{{ $order->parking_id }}">
            </div>
            <div>
                <span>Client</span>
                <span>{{ $order->user_name }}</span>
                <input class="form-control" id="user_id" type="hidden" name="user_id" value="{{ $order->user_id }}">
            </div>
            <div>
                <span>Catégorie</span>
                <span>{{ $order->category_name }}</span>
                <input class="form-control" id="category_id" type="hidden" name="category_id" value="{{ $order->category_id }}">
            
            </div>
            <div class="form-group">
                <span>Produit</span>
                {{ Form::select('product_id', $products, $order->product_id, array('class' => 'form-control', 'id' => 'product_id')) }}
            </div>

            @include('partials.form-group', [
                'title' => __('Prix Unitaire'),
                'type' => 'text',
                'name' => 'unit_price',
                'required' => false,
                'value' => $order->unit_price,
                'disabled' => '',
                ])
            <div class="form-group">
                <span>Quantité</span>
                {{ Form::select('quantity', array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10), $order->quantity, array('class' => 'form-control', 'id' => 'quantity')) }}

            </div>
            <div>
                <span>Prix total : </span>
                <span id="total_price-label">{{ $order->total_price }} €</span>
                <input class="form-control"  id="total_price" type="hidden" class="form-control" name="total_price" value="{{ $order->total_price }}" >
            </div>
            <div>
                <span>Taux de TVA (%) : </span>
                <span id="vat-label">{{ $order->vat }} %</span>
                <input class="form-control"  id="vat" type="hidden" class="form-control" name="vat" value="{{ $order->vat }}" >
            </div>


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

            <input class="form-control"  id="status" type="hidden" class="form-control" name="status" value="waiting">

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

                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }
                });
        });
        $("#quantity").change(function(e) {
            $( "#total_price" ).val(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2));
            $( "#total_price-label" ).html(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2)+" €");
        });


         $('#unit_price').keyup(function (e) {
            $( "#total_price" ).val(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2));
            $( "#total_price-label" ).html(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2)+" €");            
        });

        
    </script>
@endsection
