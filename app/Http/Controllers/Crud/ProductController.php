<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PhpParser\Error;
use \Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpKernel\Exception\HttpException;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('products.index',
            ['products' => $products]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if($req->hasFile('image_file')){
            $file =$req->file('image_file');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/products',$name);

            $req = $req->merge([
                'image_name' => $name
            ]);
        }

        DB::transaction(function () use ($req) {
            (new Product)->fill($req->all())->saveOrFail();
        });

        return redirect()->route('products.index')->with('success', 'Le produit a bien été ajouté.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
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


        DB::transaction(function () use ($req, $product) {
            $product->fill($req->all())->saveOrFail();
        });

        if($req->hasFile('image_name')){
            $file =$req->file('image_name');
            $name=time().$file->getClientOriginalName();
            $filename  = public_path('/images/products/').$name;
            if(File::exists($filename))
                File::delete($filename);
            $file->move(public_path().'/images/products/', $name);
        }

        return redirect()->route('products.index')->with('success', 'Le produit a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->forceDelete();
        return redirect()->route('products.index')->with('success', 'Le produit a bien été supprimé.');
    }

}
