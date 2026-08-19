@extends('layouts.base')

@section('contenido')
    <section>
        <h2>Catálogo de Productos</h2>
        @if(session('success'))
            <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
        @endif
        
        <ul>
            @foreach($productos as $producto)
                <li>{{ $producto->nombre }} - Bs. {{ $producto->precio }}</li>
            @endforeach
        </ul>
    </section>
@endsection

@section('scripts')
<script>
    const formularioProducto = document.querySelector("#form-producto");
    const avisoProducto = document.querySelector("#aviso-producto");

    function revisarFormularioProducto(event) {
        const nombre = document.querySelector("#nombre").value;
        const precio = parseFloat(document.querySelector("#precio").value);

        if (nombre === "") {
            event.preventDefault();
            avisoProducto.textContent = "El nombre del producto no puede estar vacío.";
            avisoProducto.classList.add("error");
            avisoProducto.classList.remove("exito");
        } else if (isNaN(precio) || precio <= 0) {
            event.preventDefault();
            avisoProducto.textContent = "El precio debe ser un número mayor a cero.";
            avisoProducto.classList.add("error");
            avisoProducto.classList.remove("exito");
        }
    }

    if (formularioProducto) {
        formularioProducto.addEventListener("submit", revisarFormularioProducto);
    }
</script>
@endsection
