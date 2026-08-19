@extends('layouts.base')

@section('contenido')
    <section>
        <h1>Fogón Boliviano</h1>
        <p>Bienvenido a Fogón Boliviano.</p>
        <p>Esta pagina será utilizada para administrar ventas de nuestro restaurante.</p>
    </section>

    <section>
        <h2>Menú Disponible</h2>
        <ul>
            @foreach($productos as $producto)
                <li>{{ $producto->nombre }} - Bs. {{ $producto->precio }}</li>
            @endforeach
        </ul>
        <p>
            <a href="/pedidos/nuevo">-> Realizar un pedido</a>
        </p>
    </section>
@endsection
