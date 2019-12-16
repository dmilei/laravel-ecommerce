<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontEndController extends Controller
{
    public function index()
    {
      return view('index')->with('products', Product::paginate(12));
    }

    /**
     * Show the product details
     *
     * @param  Product  $product (model binded by slug)
     * @return \Illuminate\Http\Response
     */
    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('single')->with('product', $product);
    }
}
