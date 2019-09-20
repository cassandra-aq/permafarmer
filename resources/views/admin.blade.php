@extends('welcome')
@section('content')

    <div class="container-fluid-admin">
        <H1 style = "text-align: center; margin-bottom: 50px">BIENVENUE SUR ADMIN</H1>
    </div>

    <div class="container-admin" style="display: flex;justify-content: center">
        <div class="sup" style="display: flex;flex-direction: column" >
            <a class="btn btn-primary" style = "margin-bottom: 50px;margin-right: 50px;cursor: pointer" href="users">Clients</a>
            <a class="btn btn-primary" style = "margin-right: 50px;cursor: pointer" href="carts">Commandes</a>
        </div>
        <div class="inf" style="display: flex;flex-direction: column">
            <a class="btn btn-primary" style = "margin-bottom: 50px;cursor: pointer" href="products">Produits</a>
            <a class="btn btn-primary" style = "cursor: pointer" href="subscriptions">Abonnements</a>
        </div>

    </div>

@endsection