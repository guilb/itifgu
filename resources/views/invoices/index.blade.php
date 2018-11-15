@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des factures')
        @endslot
        <div class="table-div-container container clearfix">
          <div class="clearfix div-row header row d-none d-md-flex">
            <div class="col-sm-2">N°</div>
            <div class="col-sm-2">Utilisateur</div>
            <div class="col-sm-2">Parking</div>
            <div class="col-sm-2">Date</div>
            <div class="col-xs-12 col-md-4">Actions</div>
          </div>

          @foreach($invoices as $invoice)
            <div class="clearfix div-row row">
              <div class="col-sm-2"><span class="d-xs-block d-sm-block d-md-none">N° : </span>{{ $invoice->number }}</div>
              <div class="col-sm-2"><span class="d-xs-block d-sm-block d-md-none">Utilisateur : </span>{{ $invoice->user->name }}</div>
              <div class="col-sm-2"><span class="d-xs-block d-sm-block d-md-none">Parking : </span>{{ $invoice->parking->name }}</div>
              <div class="col-sm-2"><span class="d-xs-block d-sm-block d-md-none">Date : </span>{{ Carbon\Carbon::parse($invoice->date)->format('d-m-Y') }}</div>
              <div class="col-xs-12 col-md-4" id="buttons">
                <a type="button" href="{{ route('invoice.show', $invoice->id) }}" class="btn  btn-primary btn-sm pull-left" data-toggle="tooltip" title="@lang('Télécharger la facture') {{ $invoice->number }}"><i class="fas fa-file-pdf fa-lg"></i></a>
              </div>
            </div>
          @endforeach
          </div>

        <div class="d-flex justify-content-center">
            {{ $invoices->links() }}
        </div>
    @endcomponent
@endsection
