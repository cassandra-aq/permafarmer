@extends('welcome')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <h2 class="subtitle">Mes abonnements</h2>
    @foreach($user->subscriptions as $subscription)
        <div class="card card-row uper m-5">
            <div class="card-body row">
                <div class="col-2"><img src="{{ asset('img/groceries.png') }}"/></div>
                <div class="col d-flex flex-column">
                    <div>@if($subscription->weight == 2.5)
                            Petite formule - Panier de 2,5 kg
                        @elseif($subscription->weight == 7)
                            Grande formule - Panier de 7 kg
                        @endif
                    </div>
                    <div><i class="fa fa-clock mr-2"></i>Crée le {{date("d-m-y", strtotime($subscription->created_at))}}
                        - Fin
                        le {{date("d-m-y", strtotime($subscription->end_at))}}</div>
                </div>
                <div class="col-2 d-flex flex-column">
                    <div>@if($subscription->weight == 2.5)
                            48,40€/mois
                        @elseif($subscription->weight == 7)
                            111,60€/mois
                        @endif
                    </div>
                    {{--                    <div><a><i class="far fa-calendar-times mx-2"></i>Annuler l'abonnement</a></div>--}}
                </div>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-3 offset-md-9">Total de mes abonnements : {{$totalSubscriptionPrice}} €</div>
    </div>


    <h2 class="subtitle">Extras</h2>
    <div class="card uper m-5 d-flex flex_columns">
        <div class="card-body align-content-center">
            <div class="row d-flex flex-row flex-wrap">
                <div class="col-2 align-self-center"><img src="{{ asset('img/shopping-bag.png') }}"/></div>
                <div class="col-6 align-self-center">
                    <div>Tote bag Perma-Farmer
                    </div>
                </div>
                <div class="col-2 align-self-center">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" id="less_bag">-</button>
                        </div>
                        <input type="text" readonly class="form-control" id="input_quantity_bag" value="0"/>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="more_bag">+</button>
                        </div>
                    </div>

                </div>

                <div class="col-2 align-self-center">
                    <div class="input-group">
                        <input type="text" readonly class="form-control" id="total_price_bag" value="0"/>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 offset-md-9" id="totalSubscription"
             data-totalSubscription="{{$totalSubscriptionPrice }}">Total ce mois-ci : {{$totalSubscriptionPrice }} €
        </div>
    </div>

    <div class="card uper m-5 justify-content-between">
        <div class="card-header">Souscrire un nouvel abonnement</div>
        <div class="card-body d-flex flex-row">
            <div class="col d-flex flex-column big_basket align-self-center m-5 p-5">
                <div>
                    <div>Grande formule</div>
                    <div>7 kg - 111,60€/mois</div>
                </div>
                <div>
                    <button class="add_button">
                        <i class="fa fa-plus my-float"></i>
                    </button>
                </div>
            </div>
            <div class="col d-flex flex-column small_basket align-self-center m-5 p-5">
                <div>
                    <div>Petite formule</div>
                    <div>2.5 kg - 48,40€/mois</div>
                </div>
                <div>
                    <button href="#" class="add_button">
                        <i class="fa fa-plus my-float"></i>
                    </button>
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