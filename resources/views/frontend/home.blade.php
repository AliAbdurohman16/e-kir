@extends('layouts.frontend.main')

@section('title', 'Beranda')

<!-- Header Area -->
@include('layouts.frontend.header')

@section('content')
<div class="page-content-wrapper">
  <div class="container">
    <div class="pt-3">
      <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
    </div>
  </div>
  
  @if ($uji == 0)
  <div class="d-flex justify-content-center align-items-center vh-100">
    <p class="text-center">Silahkan melakukan daftar uji kendaraan terlebih dahulu</p>
  </div>
  @else
  <!-- Riwayat Uji-->
  <div class="weekly-best-seller-area py-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
        <h6>Riwayat Booking</h6><a class="btn btn-sm btn-light" href="shop-list.html">
           Lihat semua<i class="ms-1 ti ti-arrow-right"></i></a>
      </div>
      <div class="row g-2">
        <!-- Weekly Product Card -->
        <div class="col-12">
          <div class="card horizontal-product-card">
            <div class="d-flex align-items-center">
              <div class="product-thumbnail-side">
                <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img src="img/product/18.png" alt=""></a>
                <!-- Wishlist  --><a class="wishlist-btn" href="#"><i class="ti ti-heart"></i></a>
              </div>
              <div class="product-description">
                <!-- Product Title --><a class="product-title d-block" href="single-product.html">Nescafe Coffee Jar</a>
                <!-- Price -->
                <p class="sale-price"><i class="ti ti-currency-dollar"></i>$64<span>$89</span></p>
                <!-- Rating -->
                <div class="product-rating"><i class="ti ti-star-filled"></i>4.88 <span class="ms-1">(39 review)</span></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Weekly Product Card -->
        <div class="col-12">
          <div class="card horizontal-product-card">
            <div class="d-flex align-items-center">
              <div class="product-thumbnail-side">
                <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img src="img/product/7.png" alt=""></a>
                <!-- Wishlist  --><a class="wishlist-btn" href="#"><i class="ti ti-heart"></i></a>
              </div>
              <div class="product-description">
                <!-- Product Title --><a class="product-title d-block" href="single-product.html">Modern Office Chair</a>
                <!-- Price -->
                <p class="sale-price"><i class="ti ti-currency-dollar"></i>$99<span>$159</span></p>
                <!-- Rating -->
                <div class="product-rating"><i class="ti ti-star-filled"></i>4.82 <span class="ms-1">(125 review)</span></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Weekly Product Card -->
        <div class="col-12">
          <div class="card horizontal-product-card">
            <div class="d-flex align-items-center">
              <div class="product-thumbnail-side">
                <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img src="img/product/12.png" alt=""></a>
                <!-- Wishlist  --><a class="wishlist-btn" href="#"><i class="ti ti-heart"></i></a>
              </div>
              <div class="product-description">
                <!-- Product Title --><a class="product-title d-block" href="single-product.html">Beach Sunglasses</a>
                <!-- Price -->
                <p class="sale-price"><i class="ti ti-currency-dollar"></i>$24<span>$32</span></p>
                <!-- Rating -->
                <div class="product-rating"><i class="ti ti-star-filled"></i>4.79 <span class="ms-1">(63 review)</span></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Weekly Product Card -->
        <div class="col-12">
          <div class="card horizontal-product-card">
            <div class="d-flex align-items-center">
              <div class="product-thumbnail-side">
                <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img src="img/product/17.png" alt=""></a>
                <!-- Wishlist  --><a class="wishlist-btn" href="#"><i class="ti ti-heart"></i></a>
              </div>
              <div class="product-description">
                <!-- Product Title --><a class="product-title d-block" href="single-product.html">Meow Mix Cat Food</a>
                <!-- Price -->
                <p class="sale-price"><i class="ti ti-currency-dollar"></i>$11.49<span>$13</span></p>
                <!-- Rating -->
                <div class="product-rating"><i class="ti ti-star-filled"></i>4.78 <span class="ms-1">(7 review)</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection