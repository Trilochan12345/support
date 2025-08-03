@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl mb-4">Login</h2>

    @if($errors->any())
        <div class="mb-4 text-red-500">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
    </form>
</div>
@endsection
