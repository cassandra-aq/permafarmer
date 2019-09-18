@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('user_types.create') }}" class="btn btn-success">Ajouter un type d'utilisateur</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Libellé</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                    @foreach($userTypes as $userType)
                        <tr>
                            <td>{{ $userType->name }}</td>
                            <td><a href="{{ route('user_types.edit', $userType) }}" class="btn btn-primary">Editer</a></td>
                            <td>
                                <form method="POST" action="{{ route('user_types.destroy', $userType) }}" onsubmit="return confirm('Etes-vous sûr ?')">
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
