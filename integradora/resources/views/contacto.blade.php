@extends('layouts.base')

@section('contenido')
    <section>
        <h2>Contacto</h2>
        
        @if(session('success'))
            <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
        @endif

        <form id="form-contacto" action="/contacto" method="POST" novalidate>
            @csrf
            
            <label for="nombre">Tu nombre</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="correo">Tu correo</label>
            <input type="email" id="correo" name="correo" required>

            <label for="asunto">Asunto</label>
            <input type="text" id="asunto" name="asunto" required>

            <label for="msg">Tu mensaje</label>
            <textarea id="msg" name="mensaje" placeholder="Escribe tu mensaje aquí..." required rows="5"></textarea>

            <button type="submit">Enviar</button>
            <br><br>
            <a href="/mensajes">Ver Mensajes Recibidos</a>
            
            <p id="aviso-contacto"></p>
        </form>
    </section>
@endsection

@section('scripts')
<script>
    const formularioContacto = document.querySelector("#form-contacto");
    const avisoContacto = document.querySelector("#aviso-contacto");

    function revisarFormulario(event) {
        const nombre = document.querySelector("#nombre").value;
        const correo = document.querySelector("#correo").value;

        if (nombre === "") {
            event.preventDefault();
            avisoContacto.textContent = "Falta tu nombre.";
            avisoContacto.classList.add("error");
            avisoContacto.classList.remove("exito");
        } else if (correo.includes("@") === false) {
            event.preventDefault();
            avisoContacto.textContent = "Ese correo no parece válido, le falta el símbolo de @.";
            avisoContacto.classList.add("error");
            avisoContacto.classList.remove("exito");
        }
    }

    if (formularioContacto) {
        formularioContacto.addEventListener("submit", revisarFormulario);
    }
</script>
@endsection
