@extends('welcome')
@section('content')
    <div id="home-admin" class="container">
        <h1>Créer un produit</h1>
        <div class="row mt-5 d-flex justify-content-around">
            <a href="">
                <div class="card h-100">
                    <h2>Utilisateurs</h2>
                </div>
            </a>
            <a href="">
                <div class="card h-100">
                    <h2>Artistes</h2>
                </div>
            </a>
            <div class="card h-100">
                <h2>Paramètres des artistes</h2>
                <ul class="list-group list-group-flush">
                    <a href=""><li class="list-group-item">Pays</li></a>
                    <a href=""><li class="list-group-item">Genres</li></a>
                    <a href=""><li class="list-group-item">Années</li></a>
                    <a href=""><li class="list-group-item">Emotions</li></a>
                </ul>
            </div>
        </div>
    </div>
@endsection