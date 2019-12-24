<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartAjaxController extends Controller
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

    header("HTTP/1.1 200 OK");
    return $this->printCart();
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

    Cart::associate($cartItem->rowId, 'App\Product');

    header("HTTP/1.1 200 OK");
    return $this->printCart();
  }

  public function deleteCartItem($id)
  {
    Cart::remove($id);

    header("HTTP/1.1 200 OK");
    return $this->printCart();
  }

  public function incrementCartItem($id, $qty)
  {
    Cart::update($id, $qty+1);

    header("HTTP/1.1 200 OK");
    return $this->printCart();
  }

  public function decrementCartItem($id, $qty)
  {
    Cart::update($id, $qty-1);

    header("HTTP/1.1 200 OK");
    return $this->printCart();
  }

  private function printCart() {
    return
    '
    <li class="cart" id="cart-container">
        <a href="#" class="js-cart-animate">
            <i class="seoicon-basket"></i>
            <span class="cart-count">'.Cart::content()->count().'</span>
        </a>

        <div class="cart-popup-wrap">
            <div class="popup-cart">
                <h4 class="title-cart">You have '.Cart::content()->count().' products in the cart!</h4>
                <p class="subtitle">Total order amount: $ '.Cart::total().'</p>
                <a href="/cart">
                  <div class="btn btn-small btn--dark">
                      <span class="text">View cart</span>
                  </div>
                </a>
            </div>
        </div>

    </li>
    ';
  }
}
