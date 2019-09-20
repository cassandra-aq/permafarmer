@extends('welcome')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <nav class="navbar navbar-light menu-yellow bg-light d-flex flex-row justify-content-end">
        <a class="navbar-brand" href="{{ route('my_subscriptions', ['user' => $user]) }}">Mes abonnements</a>
        <a class="navbar-brand" href="{{ route('my_products', ['user' => $user]) }}">Mon panier de la semaine</a>
        <a class="navbar-brand" href="{{ route('my_account', ['user' => $user]) }}">Mon compte</a>
    </nav>
    <div class="row d-flex flex-row">
        <div class="col-12">
            <h2>Récapitulatif panier</h2>
        </div>
        <div class="row d-flex align-items-around">
            @foreach($cart->products as $product)
                <div class="card product-card uper col-2 m-5">
                    <div class="card-body">
                        <img class="card-img-top"
                             width="250"
                             src="{{url($product->image_name? 'images/products/'.$product->image_name:'images/No_image.png')}}"
                             alt="{{$product->name}}"/>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <h6>{{$product->quantity($user) * 0.5}} kg </h6>
                            {{--                            <div class="input-group">--}}
                            {{--                                <div class="input-group-prepend">--}}
                            {{--                                    <button class="btn btn-outline-secondary" type="button" id="less_bag">-</button>--}}
                            {{--                                </div>--}}
                            {{--                                <input type="text" readonly class="form-control" id="input_quantity_bag"--}}
                            {{--                                       value="{{$product->quantity($user)}}"/>--}}
                            {{--                                <div class="input-group-append">--}}
                            {{--                                    <button class="btn btn-outline-secondary" type="button" id="more_bag">+</button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-12">
            <h2>Extras</h2>
        </div>
        <div class="col-11 card uper m-5 d-flex flex_columns">
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
    </div>

    <div class="row flex-column align-items-end mr-5">
        <div id="total_weight" class="col-3 m-1">Total : {{$total_weight}} kg</div>
        <button class="btn yellow_btn col-3 m-1"
                @if($total_weight >= $user->subscriptions()->first()->weight) disabled @endif>Compléter
            aléatoirement
        </button>
        <button class="btn green_btn col-3 m-1" id="submit_cart">Valider</button>
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

            $(document).on('click', '#submit_cart', function () {
                var quantity_bag = $('#input_quantity_bag').val();
                var total_price_bag = $('#total_price_bag').val();
                if (total_price_bag > 0) {
                    if (window.confirm("Vous avez choisi de prendre " + quantity_bag +  " sac(s) supplémentaire(s),  pour un montant de " + total_price_bag + " €.  Vous allez être redirigé vers notre super plateforme de paiement"))
                    {
                        window.location = 'https://www.google.fr';
                    }
                    else
                    {
                        die();
                    }
                } else {
                    alert('')
                    if (window.confirm("Votre panier a bien été enregistré. Il est en cours de préparation. Vous serez averti par e-mail lorsque votre panier sera prêt"))
                    {
                        window.location = 'http://localhost/permafarmer/public';
                    }
                    else
                    {
                        die();
                    }
                }
            });
        });
    </script>
@endpush