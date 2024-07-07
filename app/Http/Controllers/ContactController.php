<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contact', ['contacts' => $contacts]);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
    }
}
