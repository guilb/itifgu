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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $invoices->links() }}
        </div>
    @endcomponent            
@endsection
