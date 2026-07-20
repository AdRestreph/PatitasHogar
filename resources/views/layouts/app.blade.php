<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PatitasHogar</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar">
    <div class="container d-flex flex-wrap align-items-center gap-3">

        <a class="navbar-brand d-flex align-items-center me-auto"
           href="{{ route('dashboard') }}">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="PatitasHogar"
                class="navbar-logo"
                width="48"
                height="48">

            <div class="ms-3">

                <div class="navbar-title">
                    PatitasHogar
                </div>

            </div>

        </a>
        @auth
                <div class="d-flex flex-wrap align-items-center gap-2">
                    @if (auth()->user()->role === 'admin')
                        <a class="nav-link" href="{{ route('pets.index') }}"><i class="bi bi-heart me-1"></i>Mascotas</a>
                        <a class="nav-link" href="{{ route('admin.adoptions') }}"><i class="bi bi-file-earmark-check me-1"></i>Solicitudes</a>
                    @elseif (auth()->user()->role === 'adopter')
                        <a class="nav-link" href="{{ route('adopter.pets') }}"><i class="bi bi-heart me-1"></i>Mascotas</a>
                        <a class="nav-link" href="{{ route('adoption.my') }}"><i class="bi bi-clipboard-check me-1"></i>Mis solicitudes</a>
                    @elseif (auth()->user()->role === 'volunteer')
                        <a class="nav-link" href="{{ route('volunteer.followups') }}"><i class="bi bi-house-heart me-1"></i>Seguimientos</a>
                    @endif

                    <span class="text-secondary ms-sm-2"><i class="bi bi-person-circle"></i> {{ auth()->user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}" class="ms-sm-2">
                        @csrf
                        <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    @isset($header)
        <header class="bg-white border-bottom py-3">
            <div class="container">{{ $header }}</div>
        </header>
    @endisset

    <main class="container py-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{ $slot ?? '' }}
        @yield('content')
    </main>
</body>
</html>
