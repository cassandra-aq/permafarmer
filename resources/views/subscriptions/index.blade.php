@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('subscriptions.create') }}" class="btn btn-success">Ajouter un abonnement</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Crée le</th>
                        <th>Termine le</th>
                        <th>Type de panier</th>
                        <th>Durée de l'abonnement</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                    @foreach($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->user->firstname}} {{$subscription->user->lastname}}</td>
                            <td>{{ $subscription->createdAt }}</td>
                            <td>{{ $subscription->endAt}}</td>
                            @if($subscription->weight == 2.5)
                                <td>Petit panier 2.5 kg - 00.00€/mois</td>
                            @else
                                <td>Grand panier 7 kg - 00.00€/mois</td>
                            @endif
                            <td>{{ $subscription->duration }} mois</td>
                            <td><a href="{{ route('subscriptions.edit', $subscription) }}" class="btn btn-primary">Editer</a>
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
                        <form method="POST" action="{{ route('subscriptions.destroy', $subscription) }}">
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