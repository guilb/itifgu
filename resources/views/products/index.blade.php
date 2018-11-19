@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des produits')
            <a class="btn btn-primary pull-right" href="{{ route('product.create') }}">
              <i class="fas fa-plus pr5"></i> <span class="pl-2 d-none d-lg-block">@lang('Ajouter un produit')</span>
            </a>
        @endslot

        <table class="table table-light">
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>
                            <a type="button" href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger btn-sm pull-right" data-toggle="tooltip" title="@lang('Supprimer le produit') {{ $product->name }}"><i class="fas fa-trash fa-lg"></i></a>
                            <a type="button" href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm pull-right mr-2" data-toggle="tooltip" title="@lang('Modifier le produit') {{ $product->name }}"><i class="fas fa-edit fa-lg"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
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
            $('a.btn-danger').click(function(e) {
                let that = $(this)
                e.preventDefault()
                swal({
                    title: '@lang('Vraiment suppdrimer ce produit ?')',
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
        })
    </script>
@endsection
