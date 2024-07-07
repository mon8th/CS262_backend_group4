@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="pagetitle mb-4 d-flex">
    <a href="{{ route('productstock') }}" class="btn btn-link p-0 mr-2">
      <i class="fas fa-arrow-left"></i>
    </a>
    <h1 class="display-4 mb-0">Edit Event</h1>
  </div>
<section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Event</h5>
      <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" id="category" name="category" required>
            <option value="Music" {{ $product->category == 'Music' ? 'selected' : '' }}>Music</option>
            <option value="Art" {{ $product->category == 'Art' ? 'selected' : '' }}>Art</option>
            <option value="Indoors" {{ $product->category == 'Indoors' ? 'selected' : '' }}>Indoors</option>
            <option value="Outdoors" {{ $product->category == 'Outdoors' ? 'selected' : '' }}>Outdoors</option>
            <option value="Technology" {{ $product->category == 'Technology' ? 'selected' : '' }}>Technology</option>
            <option value="Sports" {{ $product->category == 'Sports' ? 'selected' : '' }}>Sports</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01" min="0" required>
        </div>
        <div class="mb-3">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" min="0" required>
        </div>
        <div class="mb-3">
          <label for="location" class="form-label">Location</label>
          <input type="text" class="form-control" id="location" name="location" value="{{ $product->location }}" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
      </form>

    </div>
  </div>
</section>
@endsection
