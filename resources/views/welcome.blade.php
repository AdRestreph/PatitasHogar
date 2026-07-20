<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PatitasHogar | Cada patita merece un hogar</title>
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
                src="{{ asset('storage/images/logo.png') }}"
                alt="PatitasHogar"
                class="navbar-logo"
                width="48"
                height="48">

            <div class="ms-3">

                <div class="navbar-title">
                    PatitasHogar
                </div>

            </div>

        </a>@auth<a href="{{ route('dashboard') }}" class="btn btn-primary">Ir al panel</a>@else<a href="{{ route('login') }}" class="btn btn-outline-primary">Iniciar sesión</a><a href="{{ route('register') }}" class="btn btn-primary">Crear cuenta</a>@endauth</div></div></nav>
    <main class="container py-5 py-md-6"><section class="row align-items-center g-5 py-md-5"><div class="col-lg-7"><span class="badge badge-status-available mb-3">Adopciones responsables</span><h1 class="display-4 mb-3">Un hogar cambia una vida. <span style="color: var(--primary);">Dos, en realidad.</span></h1><p class="lead text-muted mb-4">Conectamos mascotas que necesitan cariño con personas listas para darles una nueva oportunidad.</p><div class="d-flex flex-wrap gap-3"><a href="{{ auth()->check() ? route('adopter.pets') : route('register') }}" class="btn btn-primary btn-lg">Conocer mascotas <i class="bi bi-arrow-right ms-1"></i></a><a href="#como-funciona" class="btn btn-outline-secondary btn-lg">Cómo funciona</a></div></div><div class="col-lg-5"><div class="surface text-center p-5"><i class="bi bi-heart-fill" style="font-size: 7rem; color: var(--primary);"></i><h2 class="mt-3">Tu próximo compañero te espera</h2><p class="text-muted mb-0">Adopta, acompaña y transforma una vida.</p></div></div></section>
    <section id="como-funciona" class="py-5"><div class="text-center page-heading"><h2>Así de fácil</h2><p>Un proceso claro, humano y pensado para el bienestar de todos.</p></div><div class="row g-4"><div class="col-md-4"><div class="surface h-100"><i class="bi bi-search-heart fs-2 text-danger"></i><h3 class="mt-3">1. Conoce</h3><p class="text-muted mb-0">Explora el catálogo y encuentra a quien conecte contigo.</p></div></div><div class="col-md-4"><div class="surface h-100"><i class="bi bi-send-check fs-2 text-warning"></i><h3 class="mt-3">2. Solicita</h3><p class="text-muted mb-0">Comparte cómo sería el nuevo hogar y envía tu solicitud.</p></div></div><div class="col-md-4"><div class="surface h-100"><i class="bi bi-house-heart fs-2 text-primary"></i><h3 class="mt-3">3. Acompaña</h3><p class="text-muted mb-0">Recibe apoyo y seguimiento durante la nueva etapa.</p></div></div></div></section></main>
</body>
</html>
