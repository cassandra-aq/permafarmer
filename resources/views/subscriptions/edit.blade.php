@extends('welcome')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Modifier un utilisateur
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('users.update', $user) }}">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="type">Nom:</label>
                    <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}"/>
                    <label for="type">Prénom:</label>
                    <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}"/>
                    <label for="type">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{$user->email}}"/>

                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
    @endsection