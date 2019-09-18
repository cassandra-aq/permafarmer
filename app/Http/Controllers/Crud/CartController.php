<?php

namespace App\Http\Controllers\Crud;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::paginate(20);
        return view('carts.index', ['carts' => $carts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart =
            DB::transaction(function () use($request){
            (new Cart)->fill($request->all())->saveOrFail();
        });
        //return redirect('?',['cart'=>$cart])->with('success','La commande est validée');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
//    public function show(Cart $cart)
//    {
//        $cart = Cart::findorfail($cart->id);
//        return view('carts/show')->withCart($cart);
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        return view('carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        DB::transaction(function () use ($request, $cart) {
            $cart = $cart->fill($request->all())->saveOrFail();
        });
        return redirect()->route('carts.index')->with('success','La commande a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->forcedelete();
        return redirect()->route('?')->with('success', 'La commande a bien été supprimée.');
    }
}
