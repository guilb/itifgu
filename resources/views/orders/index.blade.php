@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des commandes')
            @if( $user->status === 'active')
                <a class="btn btn-primary float-right" href="{{ route('order.create') }}">
                    <i class="fas fa-plus pr5"></i> <span class="pl-2 d-none d-lg-block">@lang('Ajouter une commande')</span>
                </a>
            @endif
        @endslot
        <div class="table-div-container container-fluid clearfix">
          <div class="clearfix div-row header row d-none d-lg-flex">
            <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-1') }}">N°</div>
            @admin
                <div class="col-lg-2">Nom</div>
            @endadmin
            <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-2') }}">Statut</div>
            <div class="{{ differentClassAdminUser('col-lg-2', 'col-lg-2') }}">Produits</div>
            <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-1') }}">Prix</div>
            <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-2') }}">Délai</div>
            <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-2') }}">Date</div>
            <div class="{{ differentClassAdminUser('col-lg-3', 'col-lg-2') }}col-xs-12">Actions</div>
          </div>

          @foreach($orders as $order)
          <div class="clearfix div-row row">
              <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-1') }}"><span class="d-xs-block d-lg-none">N° : </span>{{ $order->id }}</div>
              @admin
                <div class="col-lg-2"><span class="d-xs-block d-lg-none">Nom : </span>{{ $order->user_firstname }} {{ $order->user_name }}</div>
            @endadmin
              <div class="statut {{ differentClassAdminUser('col-lg-1', 'col-lg-2') }}" id="status"><span class="d-xs-block d-lg-none">Statut : </span><span id="label-status" ><?php echo e(displayStatus($order->status)); ?></span></div>
              <div class="{{ differentClassAdminUser('col-lg-2', 'col-lg-2') }}"><span class="d-xs-block d-lg-none">Produits : </span>{{ $order->category_name }}<br />{{ $order->quantity }} x {{ $order->product_name }}</div>
              <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-1') }}"><span class="d-xs-block d-lg-none">Prix : </span>{{ formatPrice($order->total_price) }}</div>
              <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-2') }}"><span class="d-xs-block d-lg-none">Délai : </span>{{($order->delay) }}</div>
              <div class="{{ differentClassAdminUser('col-lg-1', 'col-lg-2') }}"><span class="d-xs-block d-lg-none">Date : </span>{{ Carbon\Carbon::parse($order->created_at)->format('d/m/y') }}</div>
              <div class="d-xs-block d-lg-none mt-4"></div>
              <div class="col-xs-12 {{ differentClassAdminUser('col-lg-3', 'col-lg-2') }} actions" id="buttons">
                @admin
                    @include('partials.action-icon-order', [
                    'tooltip' => __('Accepter la commande'),
                    'status' => 'accepted',
                    'iconclass' => 'fa-plus',
                    'btnstyle' => 'btn-success',
                    'btnsuccess' => classButtonStatus($order->status,"accepted",$order->total_price)
                    ])
                @endadmin
                @include('partials.action-icon-order', [
                'tooltip' => __('Annuler la commande'),
                'status' => 'cancelled',
                'iconclass' => 'fa-times',
                'btnstyle' => 'btn-danger',
                'btnsuccess' => classButtonStatus($order->status,"cancelled",$order->total_price)
                ])
                @include('partials.action-icon-order', [
                'tooltip' => __('Valider la commande'),
                'status' => 'validated',
                'iconclass' => 'fa-check',
                'btnstyle' => 'btn-success',
                'btnsuccess' => classButtonStatus($order->status,"validated",$order->total_price)
                ])
                @admin
                    @include('partials.action-icon-order', [
                    'tooltip' => __('Finaliser la commande'),
                    'status' => 'finished',
                    'iconclass' => 'fa-check-double',
                    'btnstyle' => 'btn-info',
                    'btnsuccess' => classButtonStatus($order->status,"finished",$order->total_price)
                    ])
                @endadmin
                @admin
                <a type="button" href="{{ route('order.edit', $order->id) }}" class="btn {{classButtonStatus($order->status,'waiting',$order->total_price) }} btn-sm btn-edit btn-warning float-left mr-2" data-toggle="tooltip" title="@lang('Modifier la commande') {{ $order->id }}"><i class="fas fa-edit fa-lg"></i></a>
                @endadmin
            </div>
            <div class="clearfix div-comment">
                @unless ($order->customer_comment=="")
                <div class="offset-lg-1 col-sm-11">
                  <div class="row">

                  <div class="alert alert-secondary">
                    <i class="fas fa-angle-right"></i><strong> Commentaire : </strong><i>" {{ $order->customer_comment }} "</i>
                  </div>
                </div>
                  </div>
                @endunless
                @unless ($order->feedback=="")
                <div class="offset-lg-1 col-sm-11">
                  <div class="row">

                  <div class=" alert alert-success">
                    <i class="fas fa-angle-double-right"></i><strong> Retour Solutis : </strong><i>" {{ $order->feedback }} "</i>
                  </div>
                </div>
                  </div>
                @endunless
            </div>
        </div>
        @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $orders->links() }}
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
                    }).done(function () {
                        //update status label
                        switch (new_status) {
                            case 'created':
                                display_status = "Créée";
                            break;
                            case 'cancelled':
                                display_status = "Annulée";
                            break;
                            case 'accepted':
                                display_status = "Acceptée";
                            break;
                            case 'finished':
                                display_status = "Terminée";
                            break;
                            case 'validated':
                                display_status = "Validée";
                            break;
                            case 'billed':
                                display_status = "Facturée";
                            break;
                            case 'waiting':
                                display_status = "En attente";
                            break;
                        }

                        that.parent('div').parent('div').children('#status').children('#label-status').html(display_status);

                        //that.parent('div').parent('div').children('#buttons').children('a').addClass( "disable-me" );


                        switch (new_status) {
                            case 'accepted':
                                console.log('accepted');
                                that.parent('div').parent('div').children('#buttons').children('.btn-status').addClass( "disable-me" );
                                that.parent('div').parent('div').children('#buttons').children('.btn-edit').addClass( "disable-me" );
                                that.parent('div').parent('div').children('#buttons').children('.btn-finished').removeClass( "disable-me" );
                            break;
                            case 'validated':
                                console.log('validated');
                                that.parent('div').parent('div').children('#buttons').children('.btn-status').addClass( "disable-me" );
                                that.parent('div').parent('div').children('#buttons').children('.btn-edit').addClass( "disable-me" );
                                that.parent('div').parent('div').children('#buttons').children('.btn-finished').removeClass( "disable-me" );
                            break;
                            case 'cancelled':
                                console.log('cancelled');
                                that.parent('div').parent('div').children('#buttons').children('.btn-edit').addClass( "disable-me" );
                                that.parent('div').parent('div').children('#buttons').children('.btn-status').addClass( "disable-me" );
                            break;
                            case 'finished':
                                console.log('finished');
                                that.parent('div').parent('div').children('#buttons').children('.btn-edit').addClass( "disable-me" );
                                that.parent('div').parent('div').children('#buttons').children('.btn-status').addClass( "disable-me" );
                            break;
                            default:
                                console.log('problème');
                            break;
                        }


                    }).fail(function () {
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
