@extends('welcome')
@section('content')
    <h3 class="jumbotron text-center">Modifier un produit</h3>
    <div class="col-lg-6 col-lg-offset-3">
        {!! Form::model($product, [
            'url' => route('products.update', $product),
            'method' => 'PATCH'
        ]) !!}
        <div class="form-group">
            <label for="name">Nom du produit</label>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="name">Prix</label>
            {{ Form::number('price', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="name">Poids en stock</label>
            {{ Form::number('weight_stocked', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="name">Unité en stock</label>
            {{ Form::number('unity_stocked', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="name">Poids à l'unité</label>
            {{ Form::number('weight', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}
@endsection
