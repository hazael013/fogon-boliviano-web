@extends('layouts.base')

@section('contenido')
    <section>
        <h2>Realizar un Pedido</h2>

        @if(session('success'))
            <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
        @endif

        <form id="form-pedido" action="/pedidos/nuevo" method="POST" novalidate>
            @csrf
            <label for="cliente_nombre">Nombre del Cliente:</label>
            <input type="text" id="cliente_nombre" name="cliente_nombre" required>

            <label for="producto_id">Seleccionar Producto:</label>
            <select id="producto_id" name="producto_id" required>
                <option value="">-- Elige un plato o bebida --</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }} (Bs. {{ $producto->precio }})</option>
                @endforeach
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="1" min="1" required>

            <button type="submit">Guardar Pedido</button>
            
            <p id="aviso-pedido"></p>
        </form>
        <br>
        <a href="/">Cancelar y volver</a>
    </section>
@endsection

@section('scripts')
<script>
    const formularioPedido = document.querySelector("#form-pedido");
    const avisoPedido = document.querySelector("#aviso-pedido");

    function revisarFormularioPedido(event) {
        const clienteNombre = document.querySelector("#cliente_nombre").value;
        const productoId = document.querySelector("#producto_id").value;
        const cantidad = parseInt(document.querySelector("#cantidad").value);

        if (clienteNombre === "") {
            event.preventDefault();
            avisoPedido.textContent = "Debes ingresar el nombre del cliente.";
            avisoPedido.classList.add("error");
            avisoPedido.classList.remove("exito");
        } else if (productoId === "") {
            event.preventDefault();
            avisoPedido.textContent = "Debes seleccionar un plato o bebida.";
            avisoPedido.classList.add("error");
            avisoPedido.classList.remove("exito");
        } else if (isNaN(cantidad) || cantidad < 1) {
            event.preventDefault();
            avisoPedido.textContent = "La cantidad debe ser al menos 1.";
            avisoPedido.classList.add("error");
            avisoPedido.classList.remove("exito");
        }
    }

    if (formularioPedido) {
        formularioPedido.addEventListener("submit", revisarFormularioPedido);
    }
</script>
@endsection
