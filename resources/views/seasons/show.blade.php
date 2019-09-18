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
                            <th>ID</th>
                            <th>Nom de la saison</th>
                            <th>Date de création</th>
                            <th>Date de mise à jour</th>
                            <th>Editer</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach($seasons as $season)
                            <tr>
                                <td>{{$season->id}}</td>
                                <td>{{$season->name}}</td>
                                <td>{{$season->created_at}}</td>
                                <td>{{$season->updated_at}}</td>
                                <td><a href="{{ route('seasons.edit',$season)}}" class="btn btn-primary">Editer</a></td>
                                <td>
                                    <form action="{{ route('seasons.destroy', $season)}}" onsubmit="return confirm('Etes vous sur ?')">
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