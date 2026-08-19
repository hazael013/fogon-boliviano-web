@extends('layouts.base')

@section('contenido')
    <section>
        <h2>Sistema de Ventas / Pedidos</h2>

        <h3>Ventas Realizadas</h3>
        <ul>
            @foreach($pedidos as $pedido)
                <li>
                    <strong>{{ $pedido->cliente_nombre }}</strong> pidió: 
                    {{ $pedido->cantidad }} x {{ $pedido->producto->nombre }} 
                    (Total: Bs. {{ $pedido->cantidad * $pedido->producto->precio }})
                </li>
            @endforeach
        </ul>
    </section>
@endsection
