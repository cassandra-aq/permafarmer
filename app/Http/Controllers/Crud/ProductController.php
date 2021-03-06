<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Product;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\File;


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
        $seasons = Season::all();
        return view('products.create', [
            'seasons' => $seasons,
        ]);
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

            $req->image_file->move(public_path('images/products'), $name);

            $req = $req->merge([
                'image_name' => $name
            ]);
        }

        DB::transaction(function () use ($req) {
            $product = new Product();
            $seasons = Season::find($req->get('season'));
            if ($seasons) {
                foreach ($seasons as $season)
                    $product->seasons()->attach($season);
            };

            $product->fill($req->all())->saveOrFail();
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
        $seasons = Season::all();
        $seasons_selected = $product->seasons()->get();
        return view('products.edit', compact(['product', 'seasons', 'seasons_selected']));
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
        if($req->hasFile('image_file')){
            $file =$req->file('image_file');
            $name=time().$file->getClientOriginalName();
            $filename  = public_path('/images/products/').$name;
            if(file_exists($filename))
                File::delete($filename);

            $file->move(public_path().'/images/products',$name);

            $req = $req->merge([
                'image_name' => $name
            ]);
        }

        DB::transaction(function () use ($req, $product) {
            $seasons = Season::find($req->get('seasons'));
            if ($seasons) {
                $product->seasons()->detach();
                foreach ($seasons as $season)
                    $product->seasons()->attach($season);
            };
            $product->fill($req->all())->saveOrFail();
        });

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
