<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function addToCart()
    {
      $product = Product::find(request()->pdt_id);
      $cartItem = Cart::add([
        'id' => $product->id,
        'name' => $product->name,
        'qty' => request()->qty,
        'price' => $product->price
      ]);

      Cart::associate($cartItem->rowId, 'App\Product');

      session()->flash('success', 'Product added to the cart.');

      return redirect()->back();
    }

    public function rapidAdd($id)
    {
      $product = Product::find($id);
      $cartItem = Cart::add([
        'id' => $product->id,
        'name' => $product->name,
        'qty' => 1,
        'price' => $product->price
      ]);

      session()->flash('success', 'Product added to the cart.');

      Cart::associate($cartItem->rowId, 'App\Product');

      return redirect()->back();
    }

    public function deleteCartItem($id)
    {
      Cart::remove($id);

      session()->flash('success', 'Product deleted from cart.');

      return redirect()->back();
    }

    public function incrementCartItem($id, $qty)
    {
      Cart::update($id, $qty+1);

      session()->flash('success', 'One item added to the cart.');

      return redirect()->back();
    }

    public function decrementCartItem($id, $qty)
    {
      Cart::update($id, $qty-1);

      session()->flash('success', 'One item deleted from cart.');

      return redirect()->back();
    }

    public function cart()
    {
      return view('cart');
    }

}
