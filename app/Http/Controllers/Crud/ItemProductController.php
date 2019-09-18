<?php

namespace App\Http\Controllers\Crud;

use App\Cart;
use App\ItemProduct;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemProducts = ItemProduct::all();
        $products = Product::all();

        foreach ($itemProducts as $itemProduct) {
            foreach ($products as $product) {
                if ($product->id == $itemProduct->product_id) {
                    $itemProduct->product = $product->name;
                }
            }
        }
        return view('item_products.index', ['itemProducts' => $itemProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = Product::findOrFail($request->get('productId'));
        $cartId = Cart::findOrFail($request->get('cartId'));

        DB::transaction(function () use($request, $productId, $cartId) {
           $itemProduct = new ItemProduct();
           $itemProduct->product_id()->associate($productId);
           $itemProduct->cart_id()->associate($cartId);
           $itemProduct->fill($request->all())->saveOrFail();
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemProduct  $itemProduct
     * @return \Illuminate\Http\Response
     */
//    public function show(ItemProduct $itemProduct)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemProduct  $itemProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemProduct $itemProduct)
    {
        return view('item_products.edit', compact('itemProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemProduct  $itemProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemProduct $itemProduct)
    {
        DB::transaction(function () use ($request, $itemProduct) {
            $itemProduct = $itemProduct->fill($request->all())->saveOrFail();
        });
        return redirect()->route('item_products.index')->with('success','Modification enregitrée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemProduct  $itemProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemProduct $itemProduct)
    {
        $itemProduct->forcedelete();
        return redirect()->route('item_products.index')->with('success', 'Suppression effectuée.');
    }
}
