@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Créer une commande')
        @endslot
        <form method="POST" action="{{ route('order.store') }}" >
            {{ csrf_field() }}
 
            <div class="form-group{{ $errors->has('product') ? ' is-invalid' : '' }}">        

            <div class="form-group">
                <label for="category_id">@lang('Catégorie')</label>
                <select id="category_id" name="category_id" class="form-control">
                    <option value="">Choisissez une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product_id">@lang('Produit')</label>
                <select id="product_id" name="product_id" class="form-control">
                        <option value="">Choisissez un produit</option>
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
                'title' => __('Statut'),
                'type' => 'hidden',
                'name' => 'status',
                'value' => 'created',
                'required' => true,
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
                'name' => 'customer_comment',
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

		$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
		$( document ).ready(function() {
		    console.log( "ready!" );
		});

        
        $( document ).ready(function() {
            console.log( "ready!" );
        });
        $("#category_id").change(function(e) {
            $( "#category_id" ).val();
            $.ajax({
                url: '/load_products/{id}',
                    type: 'POST',
                    data: {
                        id : $( "#category_id" ).val()
                    },
                        
                dataType: 'JSON',
                    success: function (data) {
                        $('#product_id').children('option:not(:first)').remove();
                        $( "#unit_price" ).val("");
                        $( "#total_price" ).val("");
                        $( "#delay" ).val("");
                        $.each(data[0], function (id,value) { 
                            $('#product_id').append($('<option/>', { 
                                value: value.id,
                                text : value.name 
                            }));
                        });      

                    //#$("#product_id").addOption("1", "Vase");

                    //$( "#unit_price" ).val(data[0].price_value);
                    //$( "#total_price" ).val($( "#quantity" ).val()*$( "#unit_price" ).val());
                    //$( "#delay" ).val(data[0].delay);

                    //console.log("eswdddd");
                   //test = jQuery.parseJSON( data );
                   //console.log(e.responseText);
                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }
                });
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