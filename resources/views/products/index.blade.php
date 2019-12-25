@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Products</h2></div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                              <th>
                                    Name
                              </th>
                              <th>
                                    Price
                              </th>
                              <th>
                                    Edit
                              </th>
                              <th>
                                    Delete
                              </th>
                        </thead>
                        <tbody>
                              @foreach($products as $product)
                                    <tr>
                                          <td>{{ $product->name }}</td>
                                          <td>${{ $product->price }}</td>
                                          <td>
                                                <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-success btn-xs">Edit</a>
                                          </td>
                                          <td>
                                                <form action="{{ route('products.destroy', $product->slug) }}" method="post">
                                                      {{ csrf_field() }}
                                                      {{ method_field('DELETE') }}
                                                      <button class="btn btn-xs btn-danger">Delete</button>
                                                </form>
                                          </td>
                                    </tr>
                              @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container">
                      {{ $products->links('pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
