@extends('welcome')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div class="container">

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Quantité</th>
                            <th>Numéro Commande</th>
                            <th>Produit</th>
                            <th>Date de création</th>
                            <th>Date de mise à jour</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach($itemProducts as $itemProduct)
                            <tr>
                                <td>{{$itemProduct->quantity}}</td>
                                <td>{{$itemProduct->cart_id}}</td>
                                <td>{{$itemProduct->product}}</td>
                                <td>{{$itemProduct->created_at}}</td>
                                <td>{{$itemProduct->updated_at}}</td>
                                <td><a href="{{ route('item_products.edit',$itemProduct)}}" class="btn btn-primary">Editer</a></td>
                                <td>
                                    <form method="POST" action="{{ route('item_products.destroy', $itemProduct) }}" onsubmit="return confirm('Etes vous sur de vouloir supprimer?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection