@extends('layouts.base')

@section('contenido')
    <section>
        <h2>Agregar Nuevo Producto (Privado)</h2>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <strong>Corrige los siguientes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="form-producto" action="/productos/nuevo" method="POST" novalidate>
            @csrf
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>

            <label for="precio">Precio (Bs.):</label>
            <input type="number" id="precio" name="precio" step="1" value="{{ old('precio') }}" required>

            <button type="submit">Guardar Producto</button>
            
            <p id="aviso-producto"></p>
        </form>
        <br>
        <a href="/panel"><- Volver al Panel</a>
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
