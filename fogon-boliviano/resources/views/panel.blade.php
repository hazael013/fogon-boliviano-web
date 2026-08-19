@extends('layouts.base')

@section('contenido')
    <section>
        <h2>Panel de Administración</h2>
        <p>Bienvenido, {{ auth()->user()->name }}. Estás en la sección privada del sistema.</p>
        
        <ul>
            <li><a href="/productos/nuevo">-> Agregar un nuevo Producto</a></li>
            <li><a href="/ventas">-> Ver el registro de Ventas</a></li>
            <li><a href="/mensajes">-> Leer los Mensajes recibidos</a></li>
        </ul>
        
        <br>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" style="background-color: #dc3545;">Cerrar Sesión</button>
        </form>
    </section>
@endsection
