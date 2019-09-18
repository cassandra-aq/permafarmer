@extends('welcome')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Modifier un utilisateur
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
            <form method="post" action="{{ route('subscriptions.update', $subscription) }}">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="weight">Type de panier :</label>
                    <select id="weight" class="form-control" name="weight">
                        <option @if($subscription->weight == 2.5) selected @endif value="2.5">
                            Petit panier 2,5 kg - 00.00€/mois
                        </option>
                        <option @if($subscription->weight != 2.5) selected @endif value="7">
                            Grand panier 7 kg - 00.00€/mois
                        </option>
                    </select>
                    {{--                    <label for="select_user">Sélectionnez un utilisateur existant dans la liste :</label>--}}
                    {{--                    <select id="select_user" class="form-control" name="user">--}}
                    {{--                        @foreach($users as $user)--}}
                    {{--                            <option @if($user->is($subscription->user)) selected @endif value="{{$user->id}}">--}}
                    {{--                                {{$user->firstname}} {{$user->lastname}}--}}
                    {{--                            </option>--}}
                    {{--                        @endforeach--}}
                    {{--                    </select>--}}
                    {{--                    <label for="duration">Durée de l'abonnement :</label>--}}
                    {{--                    <select id="duration" class="form-control" name="duration">--}}
                    {{--                        <option value="6">6 mois</option>--}}
                    {{--                        <option value="12">12 mois</option>--}}
                    {{--                    </select>--}}
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection