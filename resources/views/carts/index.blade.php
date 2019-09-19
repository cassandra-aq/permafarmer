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
            </div><br/>
        @endif
        <div class="container">

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Numéro Commande</th>
                            <th>Client</th>
                            <th>État</th>
                            <th>Date de création</th>
                            <th>Date de mise à jour</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>{{$cart->id}}</td>
                                <td>{{$cart->name}}</td>
                                <td>{{$cart->state}}</td>
                                <td>{{$cart->created_at}}</td>
                                <td>{{$cart->updated_at}}</td>
                                <td><a href="{{ route('carts.edit',$cart)}}" class="btn btn-primary">Editer</a></td>
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
                            <form method="POST" action="{{ route('carts.destroy', $cart) }}">
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
    </div>
@endsection