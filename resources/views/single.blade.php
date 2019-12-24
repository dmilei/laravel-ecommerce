@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row pt120">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="heading align-center mb60">
                <h4 class="h1 heading-title">Udemy E-commerce tutorial</h4>

                <p class="heading-text">Buy books, and we ship to you.

                </p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row medium-padding120">
        <div class="product-details">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="product-details-thumb">
                    <div class="swiper-container" data-effect="fade">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="product-details-img-wrap swiper-slide">
                                <img src="{{ asset('storage') }}/{{ $product->image }}" alt="product" data-swiper-parallax="-10">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 col-xs-offset-0">
                <div class="product-details-info">
                    <div class="product-details-info-price">${{$product->price}}</div>
                    <h3 class="product-details-info-title">{{$product->name}}</h3>
                    <p class="product-details-info-text">{{$product->description}}</p>

                    <form action="{{ route('ajax.add') }}" method="post">
                      @csrf
                      <div class="quantity">
                          <a href="#" class="quantity-minus quantity-minus-d">-</a>
                          <input title="Qty" class="email input-text qty text" name="qty" type="text" value="1">
                          <a href="#" class="quantity-plus quantity-plus-d">+</a>
                      </div>

                      <input type="hidden" name="pdt_id" value="{{ $product->id }}">

                      <button class="btn btn-medium btn--primary btn-add-to-cart" type="submit">
                          <span class="text">Add to Cart</span>
                          <i class="seoicon-commerce"></i>
                          <span class="semicircle"></span>
                      </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
