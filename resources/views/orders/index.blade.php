@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des commandes')
        @endslot
        
        <table class="table table-dark">
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td class="statut">{{ $order->status }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ formatPrice($order->total_price) }}</td>
                        <td>{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                        <td> 
                            @admin
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Accepter la commande'),
                                'status' => 'accepted',
                                'iconclass' => 'fa-plus',
                                'btnsuccess' => classButtonStatus($order->status,"accepted")
                            ])
                            @endadmin
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Annuler la commande'),
                                'status' => 'cancelled',
                                'iconclass' => 'fa-times',
                                'btnsuccess' => classButtonStatus($order->status,"cancelled")
                            ])
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Valider la commande'),
                                'status' => 'validated',
                                'iconclass' => 'fa-plus',
                                'btnsuccess' => classButtonStatus($order->status,"validated")
                            ])
                            @admin
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Finaliser la commande'),
                                'status' => 'finished',
                                'iconclass' => 'fa-check',
                                'btnsuccess' => classButtonStatus($order->status,"finished")
                            ]) 
                            @endadmin
                            @admin
                            <a type="button" href="{{ route('order.edit', $order->id) }}" class="btn {{classButtonStatus($order->status,'waiting') }}btn-sm pull-left mr-2" data-toggle="tooltip" title="@lang('Modifier la commande') {{ $order->id }}"><i class="fas fa-edit fa-lg"></i></a>
                            @endadmin
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                            all_buttons.children('.btn-sm').removeClass( "" ).addClass( "btn-success disable-me" );

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

