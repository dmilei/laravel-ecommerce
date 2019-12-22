@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($errors->any())
            <div class="alert alert-danger">
              <ul class="list-group">
              @foreach ($errors->all() as $error)
                <li class="list-group-item">{{$error}}</li>
              @endforeach
              </ul>
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h2>View Order</h2>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-2">
                          <label for="name">Email:</label>
                        </div>
                        <div class="col-10">
                          <input type="text" name="name" value="{{ $order->email }}" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-2">
                          <label for="name">Order Total:</label>
                        </div>
                        <div class="col-10">
                          <input type="text" name="order_total" value="${{ $order->order_total }}" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-2">
                          <label for="name">Placed at:</label>
                        </div>
                        <div class="col-10">
                          <input type="text" name="order_total" value="{{ $order->created_at->format('Y/m/d - H:i') }}" class="form-control" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="cart-content-header">Order details</h3>
                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                      <th>
                                            Product Id
                                      </th>
                                      <th>
                                            Product Name
                                      </th>
                                      <th>
                                            Product Price
                                      </th>
                                      <th>
                                            Quantity
                                      </th>
                                      <th>
                                            Subtotal
                                      </th>
                                </thead>
                                <tbody>
                                      @foreach($cart_content as $cart_item)
                                            <tr>
                                                  <td>{{ $cart_item['product']->id }}</td>
                                                  <td>
                                                    {{ $cart_item['product']->name }}
                                                  </td>
                                                  <td>
                                                    ${{ $cart_item['product']->price }}
                                                  </td>
                                                  <td>
                                                    {{ $cart_item['qty'] }}
                                                  </td>
                                                  <td>
                                                    ${{ $cart_item['product']->price * $cart_item['qty'] }}
                                                  </td>
                                            </tr>
                                      @endforeach
                                      <tr class="cart-sum-row">
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td>
                                              {{ $cart_total_qty }}
                                            </td>
                                            <td>
                                              ${{ $order->order_total }}
                                            </td>
                                      </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <form action="{{ route('orders.update', $order->id) }}" method="post">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <div class="row">
                          <div class="col-2">
                            <label for="name">Status:</label>
                          </div>
                          <div class="col-10">
                            <select name="status" style="width: 100%;">
                              <option value="Pending"
                              @if($order->status=="Pending")
                              selected
                              @endif
                              >Pending</option>
                              <option value="Shipping"
                              @if($order->status=="Shipping")
                              selected
                              @endif
                              >Shipping</option>
                              <option value="Fullfilled"
                              @if($order->status=="Fullfilled")
                              selected
                              @endif
                              >Fullfilled</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button class="form-control btn btn-success">Update Order</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
