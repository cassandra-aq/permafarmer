@extends('welcome')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="col-lg-6 col-lg-offset-3">
        <h3>Editer item produit</h3>
        {!! Form::model($itemProduct, [
            'url' => route('item_products.update', $itemProduct),
            'method' => 'PUT'
        ]) !!}
        <div class="form-group">
            <label for="">Quantité en produit</label>
            {{ Form::text('quantity', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}

@endsection