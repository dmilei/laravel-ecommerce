@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Orders</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                              <th>
                                    Email
                              </th>
                              <th>
                                    Order Amount
                              </th>
                              <th>
                                    Placed at
                              </th>
                              <th>
                                    Status
                              </th>
                              <th>
                                    Edit
                              </th>
                        </thead>
                        <tbody>
                              @foreach($orders as $order)
                                    <tr>
                                          <td>{{ $order->email }}</td>
                                          <td>
                                            ${{ $order->order_total }}
                                          </td>
                                          <td>
                                            {{ $order->created_at->format('Y/m/d - H:i') }}
                                          </td>
                                          <td>
                                            <span class="badge badge-warning badge-status">
                                              {{ $order->status }}
                                            </span>
                                          </td>
                                          <td>
                                                <a href="{{ route('orders.single', $order->id) }}" class="btn btn-success btn-xs">Edit</a>
                                          </td>
                                    </tr>
                              @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container">
                      {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
