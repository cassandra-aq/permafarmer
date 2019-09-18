@extends('welcome')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Ajouter un utilisateur
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('users.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="lastname">Nom:</label>
                    <input id="lastname" type="text" class="form-control" name="lastname"/>
                    <label for="firstname">Prénom:</label>
                    <input id="firstname" type="text" class="form-control" name="firstname"/>
                    <label for="email">Email:</label>
                    <input id="email" type="email" class="form-control" name="email"/>
                    <label for="password">Mot de passe:</label>
                    <input id="password" type="password" class="form-control" name="password"/>
                    <label for="userType">Type d'utilisateur</label>
                    <select id="userType" class="form-control" name="userType">
                        @foreach($userTypes as $userType)
                            <option value="{{$userType->id}}">{{$userType->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection