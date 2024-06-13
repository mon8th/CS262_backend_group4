@extends('layouts.app')

@section('title', 'Product')

@section('content')
<div class="pagetitle">
  <h1>Product</h1>
</div>
<section class="section">
  <!-- Product Section -->
  <div class="row mt-4">
    <!-- Product Card -->
    <div class="col-md-4">
      <div class="card">
        <img src="path-to-your-product-image.jpg" class="card-img-top" alt="Product Image">
        <div class="card-body">
          <h5 class="card-title">Kun Khmer tickets</h5>
          <p class="card-text">$10.00</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="ratings">
              <span class="text-warning">&#9733;</span>
              <span class="text-warning">&#9733;</span>
              <span class="text-warning">&#9733;</span>
              <span class="text-warning">&#9733;</span>
              <span class="text-muted">&#9733;</span>
              <span>(131)</span>
            </div>
            <button class="btn btn-outline-secondary">Edit Product</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Repeat Product Card for more products -->
  </div>
</section>
@endsection
