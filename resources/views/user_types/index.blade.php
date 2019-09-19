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
                            <td><a href="{{ route('user_types.edit', $userType) }}" class="btn btn-primary">Editer</a>
                            </td>
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
        <div id="modalDelete" class="modal" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel">
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
                        <form method="POST" action="{{ route('user_types.destroy', $userType) }}">
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
@endsection
