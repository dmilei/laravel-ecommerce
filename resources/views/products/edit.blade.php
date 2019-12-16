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
                  <h2>Edit Products</h2>
                </div>

                <div class="panel-body">
                    <form action="{{ route('products.update', $product->slug) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="image">Price</label>
                              <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                        </div>
                        <div class="form-group">
                          <img src="{{ asset('storage') }}/{{ $product->image }}" style="width: 100%;">
                        </div>
                        <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                              <button class="form-control btn btn-success">Save Product</button>
                        </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
