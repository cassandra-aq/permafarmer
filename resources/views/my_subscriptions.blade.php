@extends('welcome')

@section('content')
    <nav class="navbar navbar-light navbar-green bg-light d-flex flex-row justify-content-end">
        <a class="navbar-brand" href="{{ route('my_subscriptions', ['user' => $user]) }}">Mes abonnements</a>
        <a class="navbar-brand" href="{{ route('my_products', ['user' => $user]) }}">Mon panier de la semaine</a>
        <a class="navbar-brand" href="{{ route('my_account', ['user' => $user]) }}">Mon compte</a>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2>Mes abonnements</h2>
            </div>
        </div>
        <div class="row mt-5">
            @foreach($user->subscriptions as $subscription)
                <div class="card w-100">
                    <div class="card-body d-flex justify-content-between">
                        <div class="pr-3"><img class="" src="{{ asset('img/groceries.png') }}"/></div>
                        <div class="align-self-stretch">
                            <span class="h4"><strong>@if($subscription->weight == 2.5)
                                        Petite formule - Panier de 2,5 kg
                                    @elseif($subscription->weight == 7)
                                        Grande formule - Panier de 7 kg
                                    @endif
                            </strong></span>
                            <div><i class="fa fa-clock mr-2"></i>Crée le {{date("d-m-y", strtotime($subscription->created_at))}}
                                    - Fin le {{date("d-m-y", strtotime($subscription->end_at))}}</div>
                        </div>
                        <span class="d-flex align-items-center">
                            <span class="h4">@if($subscription->weight == 2.5)
                                    48,40€/mois
                                @elseif($subscription->weight == 7)
                                    111,60€/mois
                                @endif
                            </span>
                            {{--                    <div><a><i class="far fa-calendar-times mx-2"></i>Annuler l'abonnement</a></div>--}}
                        </div>
                    </div>
            @endforeach
        </div>
        <div class="row mt-2">
            <div class="col-12 text-right">
                <span class="h3">Total de mes abonnements : {{$totalSubscriptionPrice}} €</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-10 col-lg-9">
                <div class="card uper my-5 justify-content-between">
                <div class="card-header">Souscrire un nouvel abonnement</div>
                <div class="card-body p-0 text-center">
                    <div class="d-sm-flex justify-content-around">
                        <div class="flex flex-column big_basket align-self-center p-4 my-3 color-white position-relative">
                            <div>
                                <span class="h4">12 mois</span><br>
                                <span>Grande formule</span><br>
                                <span>7 kg - 111,60€/mois</span>
                            </div>
                            <div>
                                <button class="add_button" id="add_big_basket">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex flex-column small_basket align-self-center p-4 my-3 color-white position-relative">
                            <div>
                                <span class="h4">12 mois</span>
                                <div>Petite formule</div>
                                <div>2.5 kg - 48,40€/mois</div>
                            </div>
                            <div>
                                <button class="add_button" id="add_small_basket">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex justify-content-around mt-4 short-length">
                        <div class="flex flex-column big_basket align-self-center p-4 my-3 color-white position-relative">
                            <div>
                                <span class="h4">6 mois</span><br>
                                <span>Grande formule</span><br>
                                <span>7 kg - 111,60€/mois</span>
                            </div>
                            <div>
                                <button class="add_button" id="add_big_basket">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex flex-column small_basket align-self-center p-4 my-3 color-white position-relative">
                            <div>
                                <span class="h4">6 mois</span>
                                <div>Petite formule</div>
                                <div>2.5 kg - 48,40€/mois</div>
                            </div>
                            <div>
                                <button class="add_button" id="add_small_basket">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            var input_quantity = $('#input_quantity_bag');
            var input_price = $('#total_price_bag');

            $(document).on('click', '#more_bag', function () {
                let quantity = parseInt(input_quantity.val());
                quantity += 1;
                input_quantity.val(quantity);
                input_price.val(quantity);
                input_price.trigger('change');
            });

            $(document).on('click', '#less_bag', function () {
                let quantity = input_quantity.val();
                if (quantity > 0) {
                    quantity -= 1;
                }
                input_quantity.val(quantity);
                input_price.val(quantity);
                input_price.trigger('change');
            });

            input_price.change((event) => {
                let div_totalSubscription = $('#totalSubscription');
                let total_price_bags = parseInt(event.target.value);
                let total_price_without_bags = parseInt(div_totalSubscription.attr('data-totalSubscription'));
                let total = total_price_without_bags + total_price_bags;

                div_totalSubscription.html('Total ce mois-ci : ' + total + ' €');
            });

        });
    </script>
@endpush