@extends('layouts.form')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
@endsection
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Modifer le profil')
        @endslot
        <form method="POST" action="{{ route('profile.update', $user->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @include('partials.form-group', [
                'title' => __('Prénom'),
                'type' => 'name',
                'name' => 'firstname',
                'required' => true,
                'disabled' => '',
                'value' => $user->firstname,
                ])
            @include('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'name',
                'name' => 'name',
                'required' => true,
                'disabled' => '',
                'value' => $user->name,
                ])
            @include('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                'disabled' => '',
                'value' => $user->email,
                ])
            @include('partials.form-group', [
                'title' => __('Adresse postale'),
                'type' => 'address',
                'name' => 'address',
                'required' => true,
                'disabled' => '',
                'value' => $user->address,
                ])
            @include('partials.form-group', [
                'title' => __('Code Postal'),
                'type' => 'zipcode',
                'name' => 'zipcode',
                'required' => true,
                'disabled' => '',
                'value' => $user->zipcode,
                ])
            @include('partials.form-group', [
                'title' => __('Ville'),
                'type' => 'city',
                'name' => 'city',
                'required' => true,
                'disabled' => '',
                'value' => $user->city,
                ])
            @include('partials.form-group', [
                'title' => __('Pays'),
                'type' => 'country',
                'name' => 'country',
                'required' => true,
                'disabled' => '',
                'value' => $user->country,
                ])
            @include('partials.form-group', [
                'title' => __('Téléphone'),
                'type' => 'phone',
                'name' => 'phone',
                'required' => true,
                'disabled' => '',
                'value' => $user->phone,
                ])
            @admin
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="role">Statut</label>
                  </div>
                  <div class="col-md-3">
                    {{ Form::select('status', array('active' => 'Actif', 'blocked' => 'Bloqué'), $user->status, array('class' => 'form-control', 'id' => 'status')) }}
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="role">Rôle</label>
                    {{ $user->role }}
                  </div>
                  <div class="col-md-3">
                    {{ Form::select('role', array('admin' => 'Admin', 'user' => 'User'), $user->role, array('class' => 'form-control', 'id' => 'role')) }}
                  </div>
                </div>
            @else
                <input class="form-control" id="status" type="hidden" name="status" value="{{ $user->status }}">
                <input class="form-control" id="role" type="hidden" name="role" value="{{ $user->role }}">
            @endadmin
            @admin
                @if ($user->role == "user")
                    <div class="form-row">
                      <div class="col-md-3">
                        <label for="role">Site</label>
                      </div>
                      <div class="col-md-3">
                        {{ Form::select('parking_id', $parkings, $user->parking_id, array('class' => 'form-control', 'id' => 'parking_id')) }}
                      </div>
                   </div>
               @else
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="role">Site</label>
                  </div>
                  <div class="col-md-3">
                    <select class="form-control" id="parking_id" name="parking_id">
                        <option value="99">Tous les sites</option>
                    </select>
                  </div>
               </div>
               @endif

            @else
                <span>Site</span>
                <span>{{ $user->parking->name }}</span>
                <input class="form-control" id="parking_id" type="hidden" name="parking_id" value="{{ $user->parking_id }}">
            @endadmin

            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent
@endsection
@section('script')

    <script>

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });



        $("#role").change(function(e) {
            $( "#role" ).val();
            switch ($( "#role" ).val()) {
            case 'admin':
                $('#parking_id').children('option').remove();
                $('#parking_id').append($('<option/>', {
                                value: 99,
                                text : "Tous les sites"
                            }));
                break;
            case 'user':
                $('#parking_id').children('option').remove();
                @foreach($all_parkings as $parking)

                    $('#parking_id').append($('<option/>', {
                                value: {{ $parking->id }},
                                text : "{{ $parking->name }}"
                            }));
                
                @endforeach
                break;
            }
        });

                      



    </script>
@endsection
