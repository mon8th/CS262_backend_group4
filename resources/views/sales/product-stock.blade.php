@extends('layouts.app')

@section('title', 'Product Stock')

@section('content')
<div class="pagetitle">
  <h1>Product Stock</h1>
</div>
<section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Product Stock</h5>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Product Name</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Piece</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="#" alt="Product Image" style="width: 50px; height: 50px;"></td>
              <td>Songkran Paragon Tickets</td>
              <td>Indoor</td>
              <td>$60.00</td>
              <td>63</td>
              <td>
                <button class="btn btn-outline-secondary btn-sm">Edit</button>
                <button class="btn btn-outline-danger btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td><img src="#" alt="Product Image" style="width: 50px; height: 50px;"></td>
              <td>Kun Khmer Tickets</td>
              <td>Outdoor</td>
              <td>$10.00</td>
              <td>13</td>
              <td>
                <button class="btn btn-outline-secondary btn-sm">Edit</button>
                <button class="btn btn-outline-danger btn-sm">Delete</button>
              </td>
            </tr>
            <!-- Repeat for other products -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
