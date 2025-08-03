@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Create Support Ticket</h2>

    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>

       

        <button type="submit" class="btn btn-success">Submit Ticket</button>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
