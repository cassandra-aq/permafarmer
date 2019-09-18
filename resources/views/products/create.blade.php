@extends('welcome')
@section('content')
    <h3 class="jumbotron text-center">Créer un nouveau produit</h3>
    <div class="col-lg-6 col-lg-offset-3">
        {!! Form::open([
            'url' => route('products.store'),
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'file' => true
        ]) !!}
        <div class="form-group">
            <label for="name">Nom du produit</label>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="image_file">Image</label>
            {{ Form::file('image_file', null, ['class' => 'form-control-file']) }}
        </div>
        <div class="form-group">
            <label for="name">Prix</label>
            {{ Form::number('price', '0.00', ['step' => '0.01', 'class' => 'form-control']) }}
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
