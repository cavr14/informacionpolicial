@extends('components.layout')
@section('content')
        <!-- Contenido de la página de bienvenida -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <!-- Logo -->
                    <img src="{{ URL::asset('images/LOGO_POLICIAL.png') }}" alt="Logo" class="img-fluid mb-4" style="max-width: 300px;">
                    <!-- Descripción -->
                    <p class="lead" style="font-size: 28px; color: #333; font-weight: bold;">¡Bienvenido a Seguridad Total!</p>
                    <p class="text-muted" style="font-size: 18px; color: #666;">Tu plataforma para la gestión de vigilantes y casos en entidades bancarias.</p>
                    <p class="text-muted" style="font-size: 18px; color: #666;">¡Empieza a gestionar tus recursos de seguridad y personal de manera eficiente y segura!</p>
                </div>
            </div>
        </div>
@endsection

