@extends('welcome')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <h2 class="subtitle">Mes abonnements</h2>
    @foreach($cart->products as $product)
        <div class="card card-row uper m-5">
            <div class="card-body row">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" {{url($product->filename? 'images/product/'.$product->filename:'images/No_image.png')}} alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5><div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="less_bag">-</button>
                            </div>
                            <input type="text" readonly class="form-control" id="input_quantity_bag" value="{{$product->quantity}}"/>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="more_bag">+</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

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