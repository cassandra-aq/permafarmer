@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('products.create') }}" class="btn btn-success">Ajouter un Produit</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Voir le produit</th>
                        <th>Nom</th>
                        <th>prix</th>
                        <th>poids en stock</th>
                        <th>unité en stock</th>
                        <th>poids à l'unité</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><a href="{{ route('products.show', $product) }}" class="btn btn-primary">Voir le produit</a></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price  }}</td>
                            <td>{{ $product->weight_stocked }}</td>
                            <td>{{ $product->unity_stocked }}</td>
                            <td>{{ $product->weight }}</td>
                            <td><a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Editer</a></td>
                            <td>
                                <form action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Etes vous sur ?')">
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text_center">
            {{$products->links()}}
        </div>

    </div>

@endsection