@extends('welcome')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <nav class="navbar navbar-light menu-green bg-light d-flex flex-row justify-content-end">
        <a class="navbar-brand" href="{{ route('my_subscriptions', ['user' => $user]) }}">Mes abonnements</a>
        <a class="navbar-brand" href="{{ route('my_products', ['user' => $user]) }}">Mon panier de la semaine</a>
        <a class="navbar-brand" href="{{ route('my_account', ['user' => $user]) }}">Mon compte</a>
    </nav>
    <div class="row d-flex flex-row">
        <div class="col-12">
            <h2 class="subtitle">Récapitulatif panier</h2>
        </div>
        <div class="row">
            @foreach($cart->products as $product)
                <div class="card card-row uper m-5">
                    <div class="card-body row">
                        <img class="card-img-top"
                             {{url($product->filename? 'images/product/'.$product->filename:'images/No_image.png')}} alt="Card image cap">
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
            <h2 class="subtitle">Extras</h2>
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

        <div class="row justify-content-md-end">
            <div class="" id="total_weight">Total : {{$total_weight}} kg</div>
            <button class="btn btn-danger"
                    @if($total_weight >= $user->subscriptions()->first()->weight) disabled @endif>Compléter
                aléatoirement
            </button>
            <button class="btn btn-danger green-btn" type="submit">Valider</button>
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