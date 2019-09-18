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
                            <th>Numéro Commande</th>
                            <th>Client</th>
                            <th>Date de création</th>
                            <th>Date de mise à jour</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>{{$cart->id}}</td>
                                <td>
                                    @foreach($cart->users as $user)
                                        {{ $user->firsname }}
                                    @endforeach
                                </td>
                                <td>{{$cart->created_at}}</td>
                                <td>{{$cart->updated_at}}</td>
                                <td><a href="{{ route('carts.edit',$cart)}}" class="btn btn-primary">Editer</a></td>
                                <td>
                                    <form method="POST" action="{{ route('carts.destroy', $cart) }}" onsubmit="return confirm('Etes vous sur de vouloir supprimer?')">
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