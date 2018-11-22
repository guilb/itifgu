@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Gestion des Utilisateurs')
            <a class="btn btn-primary float-right" href="{{ route('user.create') }}">
              <i class="fas fa-plus pr5"></i> <span class="pl-2 d-none d-lg-block">@lang('Ajouter un utilisateur')</span>
            </a>
        @endslot
        <div class="table-div-container container-fluid clearfix">
          <div class="clearfix div-row header row d-none d-md-flex">
            <div class="col-sm-3">Email</div>
            <div class="col-sm-2">Role</div>
            <div class="col-sm-3">Nb commande à facturer</div>
            <div class="col-xs-12 col-md-4 text-right">Actions</div>
          </div>

          @foreach($users as $user)
            <div class="clearfix div-row row">
              <div class="col-sm-3"><span class="d-xs-block d-sm-block d-md-none">Email : </span>{{ $user->email }}</div>
              <div class="col-sm-2"><span class="d-xs-block d-sm-block d-md-none">Role : </span>{{ $user->role }}</div>
              <div class="col-sm-3"><span class="d-xs-block d-sm-block d-md-none">Nb de commandes à facturer : </span>{{ finishedOrders($user) }}</div>
              <div class="col-xs-12 col-md-4 actions" id="buttons">
                <a type="button" href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger btn-sm float-right" data-toggle="tooltip" title="Supprimer cet utilisateur {{ $user->email }}"><i class="fas fa-trash fa-lg"></i></a>
                <a type="button" href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm float-right mr-2" data-toggle="tooltip" title="Modifier cet utilisateur {{ $user->email }}"><i class="fas fa-edit fa-lg"></i></a>
                <a type="button" href="{{ route('order.user', $user->id) }}" class="btn btn-primary btn-sm float-right mr-2" data-toggle="tooltip" title="Afficher les commandes"><i class="fas fa-eye fa-lg"></i></a>
                @if (finishedOrders($user) != "0")
                    <a type="button" href="{{ route('invoice.store', $user) }}" class="btn btn-primary btn-invoice btn-sm float-right mr-2" data-toggle="tooltip" title="@lang('Facturer les commande de') {{ $user->name }}"><i class="fas fa-euro-sign fa-lg"></i></a>
                @endif
              </div>
            </div>
          @endforeach
      </div>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
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
                    title: '@lang('Vraiment supprimer cet utilisateur ?')',
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

            $('a.btn-invoice').click(function(e) {
                let that = $(this)
                e.preventDefault()
                $.fileDownload(that.attr('href'))
                    .done(function () {
                        that.remove();
                        console.log('File download a success!');
                    })
                    .fail(function () {
                        console.log('File download failed!');
                    });
                that.remove();

            })
        })    </script>
@endsection
