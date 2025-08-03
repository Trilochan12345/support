@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">My Support Tickets</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tickets.create') }}" class="btn btn-primary">+ Create Ticket</a>
    
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
           <tbody>
    @forelse ($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->subject }}</td>
            <td>{{ ucfirst($ticket->priority ?? 'normal') }}</td>
            <td>
                <span class="badge bg-{{ $ticket->status === 'closed' ? 'danger' : 'success' }}">
                    {{ ucfirst($ticket->status) }}
                </span>
            </td>
            <td>{{ $ticket->created_at->diffForHumans() }}</td>
            <td>
                <a href="#" class="btn btn-sm btn-info">View</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">No tickets found.</td>
        </tr>
    @endforelse
</tbody>

        </table>

        
</div>
@endsection
