@extends('welcome')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Ajouter un abonnement
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
            <form method="post" action="{{ route('subscriptions.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="weight">Type de panier :</label>
                    <select id="weight" class="form-control" name="weight">
                            <option value="small">Petit panier 2,5 kg - 00.00€/mois</option>
                            <option value="big">Grand panier 7 kg - 00.00#/mois</option>
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