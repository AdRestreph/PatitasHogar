<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PatitasHogar</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="auth-page">
        <main class="container d-flex flex-column justify-content-center align-items-center min-vh-100 py-5">
            <a href="{{ url('/') }}" class="navbar-brand mb-4">PatitasHogar</a>
            <div class="card auth-card w-100" style="max-width: 460px;">
                <div class="card-body p-4 p-md-5">{{ $slot }}</div>
            </div>
            <p class="text-muted small mt-4 mb-0">Un hogar puede cambiarlo todo.</p>
        </div>
    </body>
</html>
