@extends('welcome')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="col-lg-6 col-lg-offset-3">
        <h3>Editer Commande</h3>
        {!! Form::model($cart, [
            'url' => route('carts.update', $cart),
            'method' => 'PUT'
        ]) !!}
        <div class="form-group">
            <label for="">Etat de la commande</label>
            {{ Form::text('state', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}

@endsection