<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de control
        </h2>

    </x-slot>


    <section class="page-heading">
        <h1>Bienvenido a PatitasHogar</h1>
        <p>Gestiona mascotas, adopciones y seguimientos desde un solo lugar.</p>
    </section>
    <div class="row g-4">
        <div class="col-md-4"><div class="surface h-100"><i class="bi bi-heart-fill text-danger fs-3"></i><h3 class="mt-3">Mascotas</h3><p class="mb-0 text-muted">Consulta y administra el catálogo de compañeros en busca de hogar.</p></div></div>
        <div class="col-md-4"><div class="surface h-100"><i class="bi bi-clipboard-check text-warning fs-3"></i><h3 class="mt-3">Solicitudes</h3><p class="mb-0 text-muted">Revisa los procesos de adopción y toma decisiones informadas.</p></div></div>
        <div class="col-md-4"><div class="surface h-100"><i class="bi bi-house-heart-fill text-primary fs-3"></i><h3 class="mt-3">Seguimientos</h3><p class="mb-0 text-muted">Acompaña las adopciones para asegurar hogares felices.</p></div></div>
    </div>


</x-app-layout>
