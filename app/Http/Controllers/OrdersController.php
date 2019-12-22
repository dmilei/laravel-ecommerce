<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrdersController extends Controller
{
    /**
     * Display a list of Orders
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*
        $orders = Order::paginate(10);
        foreach (json_decode($orders->first()->cart_content) as $cart_item) {
          dd($orders->first()->cart_content);
          exit();
        }
      */
        return view('orders.index')->with('orders', Order::paginate(10));
    }

    /**
     * Display a single Item of Orders
     *
     * @return \Illuminate\Http\Response
     */
    public function single($id)
    {
        $order = Order::find($id);

        $counter = 0;
        $cart_total_qty = 0;
        foreach (json_decode($order->cart_content) as $cart_item) {
          $cart_content[$counter] = [
            'product' => Product::find($cart_item->id),
            'qty' => $cart_item->qty,
            'subtotal' => $cart_item->subtotal
          ];
          $cart_total_qty += $cart_item->qty;
          $counter++;
        }

        return view('orders.single', [
          'order' => $order,
          'cart_content' => $cart_content,
          'cart_total_qty' => $cart_total_qty
        ]);
    }

    /**
     * Update the specified order
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $order = Order::find($id);

        $order->update(['status' => request()->status]);

        session()->flash('success', 'Product updated');
        return redirect()->back();
    }
}
