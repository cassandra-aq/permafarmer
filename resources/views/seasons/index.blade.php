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
                    <a href="{{ route('seasons.create') }}" class="btn btn-success">Ajouter une Saison</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table class="table">
                        <thead>
                        <tr>
                            {{--<th>ID</th>--}}
                            <th>Nom de la saison</th>
                            <th>Date de création</th>
                            <th>Date de mise à jour</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach($seasons as $season)
                            <tr>
                                {{--<td>{{$season->id}}</td>--}}
                                <td>{{$season->name}}</td>
                                <td>{{$season->created_at}}</td>
                                <td>{{$season->updated_at}}</td>
                                <td><a href="{{ route('seasons.edit',$season)}}" class="btn btn-primary">Editer</a></td>
                                <td>
                                    {{--<form method="POST" action="{{ route('seasons.destroy', $season) }}" onsubmit="return confirm('Etes vous sur de vouloir supprimer?')">--}}
                                        {{--@csrf--}}
                                        {{--@method('DELETE')--}}
                                        <button class="btn btn-danger" id ="openModal" >Supprimer</button>
                                    {{--</form>--}}
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
                            <button type="button" class="btn btn-primary">Confirmer</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection