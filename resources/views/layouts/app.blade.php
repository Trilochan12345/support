<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Support Ticket System') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN (or include compiled CSS if using Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Optional: Include additional meta tags, styles, etc. -->
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Support Ticket System</h1>

            @auth
                <div class="flex items-center space-x-4">
                    <span>Welcome, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </header>

    <!-- Content -->
    <main class="flex-grow">
        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-10">
        <div class="container mx-auto px-4 py-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Support Ticket System. All rights reserved.
        </div>
    </footer>

</body>
</html>
