<?php

namespace App\Http\Controllers;

use App\Imageable;
use App\Photo;
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
        $products = Product::with('photos')->get();
        return view('products.index', compact('products'));
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
    public function store(Request $request)
    {
        // $product = Product::create($request->only(['name']));
        // $photos = explode(",", $request->get('photos'));
        // foreach($photos as $photo){
        //     Photo::create([
        //         'imageable_id' => $product->id,
        //         'imageable_type' => 'App\Product',
        //         'filename' => $photo
        //     ]);
        // }
        $product = Product::create($request->only(['name']));

        $photos = explode(",", $request->get('photos')); //массив
        
        foreach($photos as $filename){
            $photo = Photo::create([
                'filename' => $filename
            ]);


            Imageable::create([
                'photo_id' => $photo->id,
                'imageable_id' => $product->id,
                'imageable_type' => 'App\Product',
            ]);
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
