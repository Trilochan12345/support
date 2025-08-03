<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
   $tickets = \App\Models\Ticket::with('user')->latest()->get();
    return view('admin.index', compact('tickets'));
}

public function update(Request $request, Ticket $ticket)
{
    $request->validate([
        'status' => 'required|in:open,in progress,closed',
    ]);

   $ticket->status = $request->status;
   $ticket->save();

    return redirect()->route('admin.panel')->with('success', 'Ticket status updated.');
}


}
