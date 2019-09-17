<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(20);
        return view('/products/index',
            ['products' => $product]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        Product::create([
            'name' => $req->input('product_name'),
            'price' => $req->input('product_price'),
            'weight_stocked' => $req->input('product_weight_stocked'),
            'unity_stocked' => $req->input('product_unity_stocked'),
            'weight' => $req->input('weight'),
        ]);
        return redirect(route('index_product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findorfail($id);
        return view('products/show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorfail($id);
        return view('products/edit',
            compact('product')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Product $product)
    {
        $req->validate([
            'genre_type'=>'required'
        ]);
        $product->name = $req->input('product_name');
        $product->price = $req->input('product_price');
        $product->weight_stocked = $req->input('product_weight_stocked');
        $product->unity_stocked = $req->input('product_unity_stocked');
        $product->weight = $req->input('weight');
        $product->save();
        return redirect(route('index_product'))->with('success', 'Le produit a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findorfail($id)->forceDelete();
        return redirect(route('index_product'))->with('success', 'Le produit a été supprimé');
    }

}
