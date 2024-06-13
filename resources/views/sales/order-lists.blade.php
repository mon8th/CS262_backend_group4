@extends('layouts.app')

@section('title', 'Order Lists')

@section('content')
<div class="pagetitle">
  <h1>Order Lists</h1>
</div>
<section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Order Lists</h5>
      <!-- Filters -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="filter d-flex align-items-center">
          <i class="bi bi-filter me-2"></i>
          <select class="form-select me-2" aria-label="Filter by Date">
            <option selected>22 Apr 2024</option>
            <option value="1">21 Apr 2024</option>
            <option value="2">20 Apr 2024</option>
            <option value="3">19 Apr 2024</option>
          </select>
          <select class="form-select" aria-label="Filter by Type">
            <option selected>Order Type</option>
            <option value="1">Indoor</option>
            <option value="2">Outdoor</option>
          </select>
        </div>
        <div>
          <button class="btn btn-outline-danger">Reset Filter</button>
        </div>
      </div>
      
      <!-- Order List Table -->
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Date</th>
              <th scope="col">Type</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>00001</td>
              <td>Sok Chan</td>
              <td>Lorem Ipsum</td>
              <td>04 Apr 2024</td>
              <td>Indoor</td>
              <td><span class="badge bg-success">Completed</span></td>
            </tr>
            <tr>
              <td>00002</td>
              <td>Mony Ly</td>
              <td>Lorem Ipsum</td>
              <td>28 Apr 2024</td>
              <td>Outdoor</td>
              <td><span class="badge bg-primary">Processing</span></td>
            </tr>
            <tr>
              <td>00003</td>
              <td>Soren Chin</td>
              <td>Lorem Ipsum</td>
              <td>23 Apr 2024</td>
              <td>Outdoor</td>
              <td><span class="badge bg-danger">Cancelled</span></td>
            </tr>
            <tr>
              <td>00004</td>
              <td>Thavoro Chea</td>
              <td>Lorem Ipsum</td>
              <td>05 Feb 2024</td>
              <td>Indoor</td>
              <td><span class="badge bg-primary">Processing</span></td>
            </tr>
            <tr>
              <td>00005</td>
              <td>Thikar Sek</td>
              <td>Lorem Ipsum</td>
              <td>29 Jan 2024</td>
              <td>Outdoor</td>
              <td><span class="badge bg-success">Completed</span></td>
            </tr>
            <tr>
              <td>00006</td>
              <td>Vatey Ly</td>
              <td>Lorem Ipsum</td>
              <td>15 Feb 2024</td>
              <td>Outdoor</td>
              <td><span class="badge bg-success">Completed</span></td>
            </tr>
            <tr>
              <td>00007</td>
              <td>Rachana Yin</td>
              <td>Lorem Ipsum</td>
              <td>21 March 2024</td>
              <td>Outdoor</td>
              <td><span class="badge bg-primary">Processing</span></td>
            </tr>
            <tr>
              <td>00008</td>
              <td>Chhay Seng</td>
              <td>Lorem Ipsum</td>
              <td>30 Apr 2024</td>
              <td>Outdoor</td>
              <td><span class="badge bg-danger">Cancelled</span></td>
            </tr>
            <tr>
              <td>00009</td>
              <td>Sothea Kol</td>
              <td>Lorem Ipsum</td>
              <td>09 Jan 2024</td>
              <td>Indoor</td>
              <td><span class="badge bg-success">Completed</span></td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center">
        <div>Showing 1-9 of 15</div>
        <nav>
          <ul class="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>
@endsection
