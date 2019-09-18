@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('users.create') }}" class="btn btn-success">Ajouter un utilisateur</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname  }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Editer</a></td>
                            <td>
                                <form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Etes-vous sûr ?')">
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
        <div class="text_center">
            {{ $users->links() }}
        </div>

    </div>

@endsection
