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
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Accepter la commande'),
                                'status' => 'accepted',
                                'iconclass' => 'fa-plus',
                            ])
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Préciser la commande'),
                                'status' => 'question',
                                'iconclass' => 'fa-info',
                                    ])
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Annuler la commande'),
                                'status' => 'cancelled',
                                'iconclass' => 'fa-times',
                            ])
                            @include('partials.action-icon-order', [
                                'tooltip' => __('Finaliser la commande'),
                                'status' => 'finished',
                                'iconclass' => 'fa-check',
                            ])                                    
                            <a type="button" href="{{ route('order.edit', $order->id) }}" class="btn btn-warning btn-sm pull-left mr-2" data-toggle="tooltip" title="@lang('Modifier la commande') {{ $order->id }}"><i class="fas fa-edit fa-lg"></i></a>
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
            $('a.btn-danger').click(function(e) {
                let that = $(this)
                e.preventDefault()
                swal({
                    title: '@lang('Vraiment modifier cette commande ?')',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: '@lang('Oui')',
                    cancelButtonText: '@lang('Non')'
                }).then(function () {
                    $('[data-toggle="tooltip"]').tooltip('hide')
                    $.ajax({                        
                        url: that.attr('href'),
                        type: 'DELETE'
                    })
                        .done(function () {
                            that.parents('tr').remove()
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

            $('a.btn-cancel').click(function(e) {
                let that = $(this)
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
                            that.removeClass( "btn-cancel" ).addClass( "btn-success" );
                            console.log(that);

                            that.parents('tr').children('td').slice(2,3).html(that.attr('href').match(/([^\/]*)\/*$/)[0]);




                            
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

