@extends('welcome')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <h2 class="subtitle">Mes abonnements</h2>
    @foreach($user->subscriptions as $subscription)
        <div class="card uper m-5">
            <div class="card-body row">
                <div class="col-2"><img src="{{ asset('img/groceries.png') }}"/></div>
                <div class="col d-flex flex-column">
                    <div>@if($subscription->weight == 2.5)
                            Petite formule - Panier de 2,5 kg
                        @elseif($subscription->weight != 2.5)
                            Grande formule - Panier de 7 kg
                        @endif
                    </div>
                    <div><i class="fa fa-clock mx-2"></i>Crée le {{$subscription->created_at}} Fin
                        le {{$subscription->end_at}}</div>
                </div>
                <div class="col-2 d-flex flex-column">
                    <div>@if($subscription->weight == 2.5)
                            00.00€/mois
                        @elseif($subscription->weight != 2.5)
                            00.00€/mois
                        @endif
                    </div>
                    {{--                    <div><a><i class="far fa-calendar-times mx-2"></i>Annuler l'abonnement</a></div>--}}
                </div>


            </div>
        </div>
    @endforeach
    <div class="col-offset-10">test</div>


    <h2 class="subtitle">Extras</h2>
    <div class="card uper m-5">
        <div class="card-body row">
            <div class="col-2"><img src="{{ asset('img/shopping-bag.png') }}"/></div>
            <div class="col">
                <div>Tote bag Perma-Farmer
                </div>
            </div>
            <div class="col-2">
                <div>1€</div>
                <div><span id="delete_bag"><i class="far fa-cross mx-2"></i>Supprimer</span></div>
            </div>
        </div>
    </div>

@endsection