@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">All Support Tickets (Admin)</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>User</th>
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
                    <td>{{ $ticket->user->name ?? 'Unknown' }}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ ucfirst($ticket->priority) }}</td>
                    <td>
                        <span class="badge bg-{{ $ticket->status === 'closed' ? 'danger' : ($ticket->status === 'in progress' ? 'warning' : 'success') }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td>{{ $ticket->created_at->diffForHumans() }}</td>
                    <td>
                        <!-- Change Status Form -->
                        <form method="POST" action="{{ route('admin.update', $ticket->id) }}">
    @csrf
    @method('PATCH')

    <select name="status" onchange="this.form.submit()">
        <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
        <option value="in progress" {{ $ticket->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
        <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
    </select>
</form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No tickets found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
