@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Créer une commande')
        @endslot
        <form method="POST" action="{{ route('order.store') }}" >
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('product') ? ' is-invalid' : '' }}">

            <div class="form-row">
              <div class="col-md-3">
                <label for="category_id">@lang('Catégorie')</label>
              </div>
              <div class="col-md-6">
                <select id="category_id" name="category_id" class="form-control">
                    <option value="">Choisissez une catégorie</option>
                    @foreach($all_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-3">
                <label for="product_id">@lang('Produit')</label>
              </div>
              <div class="col-md-6">
                <select id="product_id" name="product_id" class="form-control">
                        <option value="">Choisissez un produit</option>
                </select>
              </div>
            </div>
            @admin
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="parking_id">@lang('Parking')</label>
                  </div>
                  <div class="col-md-6">
                    <select id="parking_id" name="parking_id" class="form-control">
                        <option>Choisissez un parking</option>
                        @foreach($parkings as $parking)
                            <option value="{{ $parking->id }}">{{ $parking->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="user_id">@lang('Client')</label>
                  </div>
                  <div class="col-md-6">
                    <select id="user_id" name="user_id" class="form-control">
                        <option>Choisissez un utilisateur</option>
                    </select>
                  </div>
                </div>
            @else
                <input class="form-control" id="user_id" type="hidden" name="user_id" value="{{ $this_user->id }}">

                <input class="form-control" id="parking_id" type="hidden" name="parking_id" value="{{ $this_user->parking_id }}">
            @endadmin
            @admin
                @include('partials.form-group', [
                    'title' => __('Prix Unitaire'),
                    'type' => 'text',
                    'name' => 'unit_price',
                    'required' => false,
                    'disabled' => '',
                    ])
            @else
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="unit_price">@lang('Prix unitaire : ')</label>
                  </div>
                  <div class="col-md-6">
                    <span id="unit_price-label"></span>
                    <input class="form-control"  id="unit_price" type="hidden" class="form-control" name="unit_price" value="" >
                  </div>
                </div>
            @endadmin
            <div class="form-row">
              <div class="col-md-3">
                <label for="quantity">@lang('Quantité')</label>
              </div>
              <div class="col-md-6">
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
            </div>

            <div class="form-row">
              <div class="col-md-3">
                <label for="total_price">@lang('Prix total : ')</label>
              </div>
              <div class="col-md-6">
                <span id="total_price-label"></span>
                <input class="form-control"  id="total_price" type="hidden" class="form-control" name="total_price" value="" >
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-3">
                <label for="vat">@lang('Taux de TVA (%) : ')</label>
              </div>
              <div class="col-md-6">
                <span id="vat-label"></span>
                <input class="form-control"  id="vat" type="hidden" class="form-control" name="vat" value="" >
              </div>
            </div>
            @admin
                @include('partials.form-group', [
                'title' => __('Délai'),
                'type' => 'text',
                'name' => 'delay',
                'required' => false,
                'disabled' => '',
                ])
            @else
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="delay">@lang('Délai : ')</label>
                  </div>
                  <div class="col-md-6">
                    <span id="delay-label"></span>
                    <input class="form-control"  id="delay" type="hidden" class="form-control" name="delay" value="" >
                  </div>
                </div>
            @endadmin

            <input class="form-control" id="status" type="hidden" name="status" value="created">

            @include('partials.form-group', [
                'title' => __('Commentaire (optionnel)'),
                'type' => 'text',
                'name' => 'customer_comment',
                'required' => false,
                'disabled' => '',
                ])
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
</div>
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
                         $( "#vat" ).val("");
                        $( "#vat-label" ).html("");
                        $( "#delay-label" ).html("");
                        $( "#unit_price-label" ).html("");
                        $( "#total_price-label" ).html("");

                        $.each(data[0], function (id,value) {
                            $('#product_id').append($('<option/>', {
                                value: value.id,
                                text : value.name
                            }));
                        });

                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }
                });
        });

        $("#parking_id").change(function(e) {
            $( "#parking_id" ).val();
            console.log('fqdfqd');
            $.ajax({
                url: '/load_users/{id}',
                    type: 'POST',
                    data: {
                        id : $( "#parking_id" ).val()
                    },

                dataType: 'JSON',
                    success: function (data) {
                        $('#user_id').children('option:not(:first)').remove();

                        $.each(data[0], function (id,value) {
                            $('#user_id').append($('<option/>', {
                                value: value.id,
                                text : value.name
                            }));
                        });

                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }
                });
        });


		$("#product_id").change(function(e) {
			$( "#product_id" ).val();
			$.ajax({
			    url: '/load_product/{id}',
		            type: 'POST',
		            data: {
						id : $( "#product_id" ).val()
		            },

			    dataType: 'JSON',
		            success: function (data) {
                        console.log(data[0].price_value);
                        if (data[0].price_value==null) {
                            console.log('null');
                            $( "#unit_price" ).val("");
                            $( "#unit_price-label" ).html("Prix variable");
                            $( "#total_price" ).val("");
                            $( "#total_price-label" ).html("Nous vous ferons parvenir un prix");
                        }
                        else
                        {
                            console.log('pas null');

                            $( "#unit_price" ).val(parseFloat(data[0].price_value).toFixed(2));
                            $( "#unit_price-label" ).html(data[0].price_value+" €");
                            $( "#total_price" ).val(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2));
                            $( "#total_price-label" ).html(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2)+" €");
                        }
                        $( "#delay" ).val(data[0].delay);
                        $( "#delay-label" ).html(data[0].delay);
                        $( "#vat" ).val(data[0].vat);
                        $( "#vat-label" ).html(data[0].vat+" %");

		            },
		            error: function (e) {
		                console.log(e.responseText);
		            }
		        });
		});

        $("#quantity").change(function(e) {
            console.log("qty");
            console.log($( "#unit_price" ).val());
            if ($( "#unit_price" ).val()!="") {
                $( "#total_price" ).val(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2));
                $( "#total_price-label" ).html(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2)+" €");
            }
        });


         $('#unit_price').keyup(function (e) {
            if ($( "#unit_price" ).val()!=""){
                $( "#total_price" ).val(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2));
                $( "#total_price-label" ).html(parseFloat($( "#quantity" ).val()*$( "#unit_price" ).val()).toFixed(2)+" €");
            }
            else
            {
                $( "#total_price" ).val("");
                $( "#total_price-label" ).html("Nous vous ferons parvenir un prix");
            }
         });


    </script>
@endsection
