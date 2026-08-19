@extends('layouts.base')

@section('contenido')
    <p>La mejor librería de barrio.</p>

    <p>Hay {{ count($libros) }} libros en el catálogo.</p>

    <ul>
        @foreach($libros as $libro)
            <li>{{ $libro->titulo }} - Bs {{ $libro->precio }}</li>
        @endforeach
    </ul>

    <p>Catálogo atendido por Hazael Fernando Alanoca Alarcon</p>

    <a href="/libros/nuevo">Registrar libro nuevo</a>
@endsection
