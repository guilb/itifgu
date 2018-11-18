<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $invoice->number }}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            h1,h2,h3,h4,p,span,div { font-family: DejaVu Sans; }
        </style>
    </head>
    <body>
        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width:250pt;">
                <img class="img-rounded" height="{{ $invoice->logo_height }}" src="{{ $invoice->logo }}">
            </div>
            <div style="margin-left:300pt;">
                <b>Date: </b>{{ Carbon\Carbon::parse($invoice->date)->format('d-m-Y') }}<br />
                <b>Facture #: </b> {{ $invoice->number }}
                <br />
            </div>
        </div>
        <br />
        <h2>{{ $invoice->name }} {{ $invoice->number ? '#' . $invoice->number : '' }}</h2>
        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width:250pt;">
                <h4>Business Details:</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
						VITASERVICES<br />
						2 Bd Thomson - C.S 60500<br />
						59815 LESQUIN Cedex<br />
						RCS de Lille n°428 801 419<br />
						TVA Intra : FR66 428 801 419<br />
						SIRET : 428 801 419 000 71<br />
                    </div>
                </div>
            </div>
            <div style="margin-left: 300pt;">
                <h4>Client :</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{ $invoice->user_name }}<br />
                        {{ $invoice->user_address }}<br />
                        {{ $invoice->user_zipcode }} {{ $invoice->user_city }}<br />
                        {{ $invoice->user_country }}<br />
                    </div>
                </div>
            </div>
        </div>
        <h4>Items:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire HT</th>
                    <th>Montant HT</th>
                    <th>TVA</th>
                    <th>Montant TTC</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->orders as $order)
                    <tr>
                        <td>{{ $order->product_name }}{{ $order->id }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ formatPrice($order->unit_price/((100+$order->vat)/100)) }}</td>
                        <td>{{ formatPrice($order->quantity*$order->unit_price/((100+$order->vat)/100)) }}</td>
                        <td>{{ $order->vat }} %</td>
                        <td>{{ formatPrice($order->total_price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="clear:both; position:relative;">
                <div style="position:absolute; left:0pt; width:250pt;">
                    <h4>Notes:</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Informations complémentaires (à nous fournir)
                        </div>
                    </div>
                </div>
            <div style="margin-left: 300pt;">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Taux TVA (%)</th>
                            <th>Base HT</th>
                            <th>Montant</th>
                        </tr>
                        @foreach ($vats as $vat)
                            <tr>
                                <td>{{ $vat->percentage }}</td>
                                <td>{{ formatPrice($vat->ht) }}</td>
                                <td>{{ formatPrice($vat->vat) }}</td>
                            </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
            <div style="margin-left: 300pt;">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Total HT</b></td>
                            <td>{{ formatPrice($invoice->total_ht()) }}</td>
                        </tr>
                        <tr>
                            <td><b>Total TVA</b></td>
                            <td>{{ formatPrice($invoice->total_vat()) }}</td>
                        </tr>
                        <tr>
                            <td><b>Total TTC</b></td>
                            <td>{{ formatPrice($invoice->total_ttc()) }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
