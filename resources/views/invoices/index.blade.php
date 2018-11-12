@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des factures')
        @endslot
        
        <table class="table table-dark">
            <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->number }}</td>
                        <td>{{ $invoice->user->name }}</td>
                        <td>{{ $invoice->parking->name }}</td>
                        <td>{{ Carbon\Carbon::parse($invoice->date)->format('d-m-Y') }}</td>
                        <td>
                            <a type="button" href="{{ route('invoice.show', $invoice->id) }}" class="btn  btn-sm pull-left mr-2" data-toggle="tooltip" title="@lang('Télécharger la facture') {{ $invoice->number }}"><i class="fas fa-file-pdf fa-lg"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $invoices->links() }}
        </div>
    @endcomponent            
@endsection
