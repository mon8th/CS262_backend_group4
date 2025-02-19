<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Define redirection
        switch (strtolower($query)) {
            case 'contact':
                return redirect()->route('contact.index');
            case 'profile':
                return redirect()->route('profile.edit');
            case 'dashboard':
                return redirect()->route('dashboard');
            case 'product':
                return redirect()->route('productstock');
            case 'ticket':
                return redirect()->route('ticketslist');
            case 'user':
                return redirect()->route('customers.index');
            case 'help':
                return '/help';
            case 'host':
                return redirect()->route('hosts.index');
            default:
                return redirect()->route('dashboard')->with('error', 'No results found.');
        }
    }
}
