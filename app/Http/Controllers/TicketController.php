<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::paginate(10);
        return view('products.ticketlist', ['tickets' => $tickets]);
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('tickets.index');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $tickets = Ticket::with('product', 'user')
            ->where('booking_ticket_code', 'like', "%{$searchTerm}%")
            ->paginate(10);

        return view('products.ticketlist', ['tickets' => $tickets, 'search' => $searchTerm]);
    }
}
