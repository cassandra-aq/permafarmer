@extends('welcome')
@section('content')
    <h3 class="jumbotron text-center">Modifier un produit</h3>
    <div class="col-lg-6 col-lg-offset-3">
        {!! Form::model($product, [
            'url' => route('products.update', $product),
            'method' => 'PATCH',
            'enctype' => 'multipart/form-data',
            'file' => true
        ]) !!}
        <div class="form-group">
            <label for="name">Nom du produit</label>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="text-center">
            <img class="card-img-top mb-2 w-50" src="{{url($product->image_name? 'images/products/'.$product->image_name:'images/No_image.png')}}" alt="{{$product->name}}"/>
        </div>
        <div class="form-group">
            <label for="image_file">Image</label>
            {{ Form::file('image_file', null, ['class' => 'form-control-file']) }}
        </div>
        <div class="form-group">
            <label for="name">Prix</label>
            {{ Form::number('price', null, ['step' => '0.01', 'class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="name">Poids en stock (Kg)</label>
            {{ Form::number('weight_stocked', null, ['step' => '0.001', 'class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="name">Unité en stock</label>
            {{ Form::number('unity_stocked', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            <label for="name">Poids à l'unité (Kg)</label>
            {{ Form::number('weight', null, ['step' => '0.001', 'class' => 'form-control']) }}
        </div>
        {{ Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}
@endsection
