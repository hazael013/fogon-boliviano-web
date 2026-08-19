@extends('layouts.base')

@section('contenido')
    <section>
        <h2>Entrar al panel</h2>

        @if (session('error'))
            <p style="color: #b00020;"><strong>{{ session('error') }}</strong></p>
        @endif

        <form action="/login" method="POST" novalidate>
            @csrf

            <p>
                <label for="email">Correo:</label><br>
                <input type="email" id="email" name="email" required>
            </p>

            <p>
                <label for="password">Contraseña:</label><br>
                <input type="password" id="password" name="password" required>
            </p>

            <p><button type="submit">Entrar</button></p>
        </form>
    </section>
@endsection
