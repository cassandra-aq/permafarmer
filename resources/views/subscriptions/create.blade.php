@extends('welcome')
@push('style')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
@endpush

@section('content')
    <div class="card uper">
        <div class="card-header">
            Ajouter un abonnement
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('subscriptions.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="weight">Type de panier :</label>
                    <select id="weight" class="form-control" name="weight">
                        <option value="2.5">Petit panier 2,5 kg - 48,40€/mois</option>
                        <option value="7">Grand panier 7 kg - 111,60€/mois</option>
                    </select>
                    <label for="select_user">Sélectionnez un utilisateur existant dans la liste :</label>
                    <select id="select_user" class="form-control" name="user">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                        @endforeach
                    </select>
                    <label for="duration">Durée de l'abonnement :</label>
                    <select id="duration" class="form-control" name="duration">
                        <option value="6">6 mois</option>
                        <option value="12">12 mois</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection