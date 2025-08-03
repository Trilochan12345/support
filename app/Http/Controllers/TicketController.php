<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
{
    $tickets = \App\Models\Ticket::where('user_id', auth()->id())->latest()->get();
    return view('tickets.index', compact('tickets'));
}

public function create()
{
    return view('tickets.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Assuming you have a Ticket model
    \App\Models\Ticket::create([
        'user_id' => auth()->id(),
        'subject' => $validated['subject'],
        'message' => $validated['message'],
        'status' => 'open',
    ]);

    return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
}



}
