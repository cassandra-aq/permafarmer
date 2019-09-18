@extends('welcome')
@section('content')
    @foreach($users as $user)
        <div class="my-3" id="<?php echo ($user->name); ?>">
            <div class="card">
                <figure class="artist-img-container">
                    <img class="card-img-top"
                         width="250"
                         src=""
                         alt="{{$user->name}}"/>
                </figure>
                <div class="card-body">
                    <div class="card-title">
                        <h1 class="text-center">{{$user->name}}</h1>
                    </div>
                    <div class="card-text">
                        <p></p>
                    </div>
                    <a href="{{ route('users.show', $user) }}">Voir plus</a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="w-100 d-flex justify-content-center mt-4">
        <div class="d-inline-block">
            {{ $users->withPath(route('products.index'))->links() }}
        </div>
    </div>
@endsection