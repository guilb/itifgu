@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des commandes')
            <a class="btn btn-primary pull-right" href="{{ route('order.create') }}">
              <i class="fas fa-plus pr5"></i> <span class="pl-2 d-none d-lg-block">@lang('Ajouter une commande')</span>
            </a>
        @endslot

        <div class="table-div-container container clearfix">
          <div class="clearfix div-row header row d-none d-md-flex">
            <div class="col-sm-1">N°</div>
            <div class="col-sm-2">Nom</div>
            <div class="col-sm-1">Statut</div>
            <div class="col-sm-2">Produit</div>
            <div class="col-sm-1">Q.</div>
            <div class="col-sm-1">Prix</div>
            <div class="col-sm-1">Date</div>
            <div class="col-xs-12 col-md-3">Actions</div>
          </div>

          @foreach($orders as $order)
            <div class="clearfix div-row row">
              <div class="col-sm-1"><span class="d-xs-block d-sm-block d-md-none">N° : </span>{{ $order->id }}</div>
              <div class="col-sm-2"><span class="d-xs-block d-sm-block d-md-none">Nom : </span>{{ $order->user->name }}</div>
              <div class="statut col-sm-1"><span class="d-xs-block d-sm-block d-md-none">Statut : </span><?php echo e(displayStatus($order->status)); ?></div>
              <div class="col-sm-2"><span class="d-xs-block d-sm-block d-md-none">Produit : </span>{{ $order->product->name }}</div>
              <div class="col-sm-1"><span class="d-xs-block d-sm-block d-md-none">Quantité : </span>{{ $order->quantity }}</div>
              <div class="col-sm-1"><span class="d-xs-block d-sm-block d-md-none">Prix : </span>{{ formatPrice($order->total_price) }}</div>
              <div class="col-sm-1"><span class="d-xs-block d-sm-block d-md-none">Date : </span>{{ Carbon\Carbon::parse($order->created_at)->format('d/m/y') }}</div>
              <div class="d-xs-block d-sm-block d-md-none mt-4"></div>
              <div class="col-xs-12 col-md-3">
                @admin
                @include('partials.action-icon-order', [
                  'tooltip' => __('Accepter la commande'),
                  'status' => 'accepted',
                  'iconclass' => 'fa-plus',
                  'btnstyle' => 'btn-success',
                  'btnsuccess' => classButtonStatus($order->status,"accepted")
                            ])
                            @endadmin
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Annuler la commande'),
                                'status' => 'cancelled',
                                'iconclass' => 'fa-times',
                                'btnstyle' => 'btn-danger',
                                'btnsuccess' => classButtonStatus($order->status,"cancelled")
                            ])
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Valider la commande'),
                                'status' => 'validated',
                                'iconclass' => 'fa-plus',
                                'btnstyle' => 'btn-success',
                                'btnsuccess' => classButtonStatus($order->status,"validated")
                            ])
                            @admin
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Finaliser la commande'),
                                'status' => 'finished',
                                'iconclass' => 'fa-check',
                                'btnstyle' => 'btn-info',
                                'btnsuccess' => classButtonStatus($order->status,"finished")
                            ])
                            @endadmin
                            @admin
                            <a type="button" href="{{ route('order.edit', $order->id) }}" class="btn {{classButtonStatus($order->status,'waiting') }} btn-sm btn-warning pull-left mr-2" data-toggle="tooltip" title="@lang('Modifier la commande') {{ $order->id }}"><i class="fas fa-edit fa-lg"></i></a>
                            @endadmin
                          </div>
                          <div class="clearfix div-comment">
                            @unless ($order->customer_comment=="")
                              <div class="col-xs-12"><strong>Commentaire :</strong> {{ $order->customer_comment }}</div>
                            @endunless
                            @unless ($order->feedback=="")
                            <div class="col-xs-12"><strong>Feedback :</strong> {{ $order->feedback }}</div>
                            @endunless
                          </div>
                    </div>
                @endforeach
        </div>
    @endcomponent
@endsection
@section('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            })
            $('[data-toggle="tooltip"]').tooltip()


            $('a.btn-status').click(function(e) {
                let that = $(this)
                new_status = that.attr('href').match(/([^\/]*)\/*$/)[0]
                e.preventDefault()
                swal({
                    title: '@lang('Vraiment modifier le statut cette commande ?')',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: '@lang('Oui')',
                    cancelButtonText: '@lang('Non')'
                }).then(function () {
                    $('[data-toggle="tooltip"]').tooltip('hide')
                    $.ajax({
                        url: that.attr('href'),
                        type: 'POST'
                    })
                        .done(function () {
                            //update status label
                            that.parents('tr').children('td').slice(2,3).html(new_status);
;
                            console.log(that);
                            all_buttons = that.parents('tr').children('td').slice(7,8)
                            all_buttons.children('.btn-sm').removeClass( "" ).addClass( "disable-me" );

                            switch (new_status) {
                                case 'accepted':
                                    alert('accepted');
                                    all_buttons.children('.btn-finished').removeClass( "btn-success disable-me" ).addClass( "" );
                                    break;
                                case 'validated':
                                    alert('validated');
                                    break;
                                case 'cancelled':
                                    alert('cancelled');
                                    break;
                                case 'finished':
                                    alert('finished');

                                    break;
                                case 'question':
                                    alert('question');
                                    break;
                                default:
                                    alert('problème');
                            }


                        })
                        .fail(function () {
                            swal({
                                title: '@lang('Il semble y avoir une erreur sur le serveur, veuillez réessayer plus tard...')',
                                type: 'warning'
                            })
                        }
                    )
                })
            })
        })
    </script>
@endsection
