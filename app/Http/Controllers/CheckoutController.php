<?php

namespace App\Http\Controllers;

use Mail;
use Cart;
use App\Order;
use Stripe\Stripe;
use Stripe\Charge;
use App\Mail\PurchaseSuccessful;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
      if(Cart::content()->count() == 0){
        session()->flash('success', 'Your cart is empty!');
        return redirect()->back();
      }
      return view('checkout');
    }

    public function pay()
    {
      Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
      $token = request()->stripeToken;

      $charge = Charge::create([
        'amount' => Cart::total() * 100,
        'currency' => 'usd',
        'description' => 'Laravel Ecommerce Charge',
        'source' => $token
      ]);

      session()->flash('success', 'Purchase successful. Please check out our email confirmation.');

      $order = new Order;

      $order->create([
        'email' => request()->stripeEmail,
        'status' => 'Pending',
        'cart_content' => Cart::content(),
      ]);

      Mail::to(request()->stripeEmail)->send(new PurchaseSuccessful());

      Cart::destroy();

      return redirect('/');
    }
}
