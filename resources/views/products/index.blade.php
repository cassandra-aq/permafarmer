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
                        <th>Image</th>
                        <th>Nom</th>
                        <th>prix</th>
                        <th>Saisons</th>
                        <th>poids en stock</th>
                        <th>unité en stock</th>
                        <th>poids à l'unité</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td width="70">
                                <img class="card-img-top" width="70"
                                     src="{{url($product->image_name? 'images/products/'.$product->image_name:'images/No_image.png')}}"
                                     alt="{{$product->name}}"/>
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price  }}</td>
                            <td>
                                @foreach($product->seasons as $season)
                                    <span class="btn btn-secondary disabled">{{ $season->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $product->weight_stocked }}</td>
                            <td>{{ $product->unity_stocked }}</td>
                            <td>{{ $product->weight }}</td>
                            <td><a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Editer</a></td>
                            <td>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">
                                    Supprimer
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="modalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Supprimer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Etes-vous sûr de vouloir supprimer ?.</p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection