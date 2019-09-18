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
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </thead>
                    <tbody>
                    @foreach($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->createdAt }}</td>
                            <td>{{ $subscription->endAt}}</td>
                            <td>{{ $subscription->weight }}</td>
                            <td>{{ $subscription->duration }}</td>
                            <td><a href="{{ route('subscriptions.edit', $subscription) }}" class="btn btn-primary">Editer</a></td>
                            <td>
                                <form method="POST" action="{{ route('subscriptions.destroy', $subscription) }}" onsubmit="return confirm('Etes-vous sûr ?')">
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
            {{ $subscriptions->links() }}
        </div>

    </div>

@endsection
