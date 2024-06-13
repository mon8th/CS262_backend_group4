@extends('layouts.app')

@section('title', 'Dashboard - Cambo Events')

@section('content')
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <!-- Total Users Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card">
            <div class="card-body">
              <h5 class="card-title">Total Users</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                  <i class="bi bi-people text-primary"></i>
                </div>
                <div class="ps-3">
                  <h6>100</h6>
                  <span class="text-success small pt-1 fw-bold">8% Up</span> <span class="text-muted small pt-2 ps-1">from yesterday</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Users Card -->

        <!-- Total Orders Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card">
            <div class="card-body">
              <h5 class="card-title">Total Orders</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                  <i class="bi bi-box-seam text-info"></i>
                </div>
                <div class="ps-3">
                  <h6>105</h6>
                  <span class="text-success small pt-1 fw-bold">1.3% Up</span> <span class="text-muted small pt-2 ps-1">from past week</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Orders Card -->

        <!-- Total Sales Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card">
            <div class="card-body">
              <h5 class="card-title">Total Sales</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                  <i class="bi bi-currency-dollar text-success"></i>
                </div>
                <div class="ps-3">
                  <h6>$588</h6>
                  <span class="text-danger small pt-1 fw-bold">4.3% Down</span> <span class="text-muted small pt-2 ps-1">from yesterday</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Sales Card -->

        <!-- Pending Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card">
            <div class="card-body">
              <h5 class="card-title">Pending</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                  <i class="bi bi-clock-history text-danger"></i>
                </div>
                <div class="ps-3">
                  <h6>50</h6>
                  <span class="text-success small pt-1 fw-bold">1.8% Up</span> <span class="text-muted small pt-2 ps-1">from yesterday</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Pending Card -->
      </div>

      <!-- Sales Chart -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sales</h5>
              <div id="salesChart"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Sales Chart -->

      <!-- Deals Details -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Deals Details</h5>
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Date - Time</th>
                    <th scope="col">Piece</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <img src="{{ asset('assets/img/deal-1.jpg') }}" alt="" class="rounded-circle" width="50" height="50">
                      <span>Kun Khmer</span>
                    </td>
                    <td>lorem ipsum</td>
                    <td>12.04.2024 - 12:53 PM</td>
                    <td>21</td>
                    <td>$588</td>
                    <td><span class="badge bg-success">Delivered</span></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('assets/img/deal-2.jpg') }}" alt="" class="rounded-circle" width="50" height="50">
                      <span>See You Soon</span>
                    </td>
                    <td>Aeon 2</td>
                    <td>02.04.2024 - 2:22 PM</td>
                    <td>50</td>
                    <td>$300</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                  </tr>
                  <tr>
                    <td>
                      <img src="{{ asset('assets/img/deal-3.jpg') }}" alt="" class="rounded-circle" width="50" height="50">
                      <span>Khmer Trad. Game</span>
                    </td>
                    <td>Wat</td>
                    <td>21.03.2024 - 1:22 PM</td>
                    <td>10</td>
                    <td>$0</td>
                    <td><span class="badge bg-danger">Rejected</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- End Deals Details -->
    </div>
  </div>
</section>

<!-- Include ApexCharts Library -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  var options = {
    series: [{
      name: "Sales",
      data: [0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000]
    }],
    chart: {
      height: 350,
      type: 'line'
    },
    stroke: {
      width: 2
    },
    xaxis: {
      categories: ['16 Apr', '17 Apr', '18 Apr', '19 Apr', '20 Apr', '21 Apr', '22 Apr']
    },
    tooltip: {
      x: {
        format: 'dd MMM, yyyy'
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#salesChart"), options);
  chart.render();
});
</script>
@endsection
