@extends('welcome')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <h2 class="subtitle">Mes abonnements</h2>
    <div class="card uper">
        <div class="card-body row">
            <div class="col-2"><img src="{{ asset('img/groceries.png') }}"/></div>
            <div class="col d-flex">
                <div class="col-12"></div>
                <div class="col-12"></div>
            </div>
            <div class="col-3"></div>


        </div>

    </div>
    <h2 class="subtitle">Extras</h2>
    </div>

@endsection