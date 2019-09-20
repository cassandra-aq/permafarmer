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
                        <form method="POST" action="{{ route('users.destroy', $user) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="text_center">
            {{ $users->links() }}
        </div>
    </div>
@endsection
