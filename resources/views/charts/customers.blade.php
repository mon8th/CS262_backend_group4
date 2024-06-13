@extends('layouts.app')

@section('title', 'Customer Tracking')

@section('content')
<div class="pagetitle">
  <h1>Customer Tracking</h1>
</div>
<section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Customer Tracking</h5>
      <canvas id="customersChart" width="400" height="200"></canvas>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    var ctx = document.getElementById('customersChart').getContext('2d');
    var customersChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Customers',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection
