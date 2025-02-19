@extends('layouts.app')

@section('title', 'Tickets List')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="pagetitle mb-8">
            <h1 class="display-4">Tickets</h1>
        </div>
        <form class="form-inline" action="{{ route('tickets.search') }}" method="GET">
            <input type="text" id="searchInput" name="search" placeholder="Search Ticket Code" class="form-control" value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="ticketsTable">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>User Email</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Booking Ticket Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->product->name }}</td>
                        <td>{{ Str::limit($ticket->product->description, 10, '...') }}</td>
                        <td>${{ number_format($ticket->product->price, 2) }}</td>
                        <td>{{ $ticket->user->email }}</td>
                        <td>{{ $ticket->quantity }}</td>
                        <td>${{ number_format($ticket->total_price, 2) }}</td>
                        <td>{{ $ticket->booking_ticket_code }}</td>
                        <td>
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?')" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $tickets->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection



