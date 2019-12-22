<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductsController extends Controller
{
    /**
    * using auth middleware
    *
    *
    */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products', Product::paginate(10));
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
    public function store(CreateProductRequest $request)
    {

      $product = new Product;
      $image = $request->image->store('posts');

      $product->create([
        'name' => $request->name,
        'slug' => str_slug($request->name),
        'price' => $request->price,
        'image' => $image,
        'description' => $request->description,
      ]);

      session()->flash('success', 'Product posted');
      return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $data = $request->only(['name', 'price', 'description']);
        if($request->image){
          $data['image'] = $request->image->store('posts');
          $product->deleteImage();
        }


        $product->update($data);

        session()->flash('success', 'Product updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(file_exists($product->image)){
          unline($product->image);
        }

        $product->delete();

        session()->flash('success', 'Product deleted');
        return redirect()->route('products.index');
    }
}
