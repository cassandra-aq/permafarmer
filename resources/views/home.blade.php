@extends('welcome')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.</p>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>Nos Produits du moment</h1>
            </div>
                @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3 my-3 px-4">
                    <div class="card product-card">
                        <figure class="product-img-container">
                            <img class="card-img-top"
                                 width="250"
                                 src="{{url($product->filename? 'images/product/'.$artist->filename:'images/No_image.png')}}"
                                 alt="{{$product->name}}"/>
                        </figure>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item py-4">
                                    <span class="card-title">{{ $product->name }}</span>
                                    <a href="#" class="btn-add-product" data-target="add-product" data-product="{{ $product->id }}">+</a>
                                    <span class="nb-products">0</span>
                                    <a href="#" class="btn-remove-product" data-target="delete-product" data-product="{{ $product->id }}">-</a>
                                </li>
                                <li class="list-group-item py-4 product-infos">
                                    <span>
                                        {{ $product->price }} €
                                    </span>
                                    <span>
                                        @if ($product->unity_stocked)
                                            la pièce
                                        @else
                                            les 500g
                                        @endif
                                    </span>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="text_center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection