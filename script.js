const botonTema = document.getElementById('btn-tema');

botonTema.addEventListener('click', function() {
    document.body.classList.toggle('modo-oscuro');
    
    if (document.body.classList.contains('modo-oscuro')) {
        botonTema.textContent = '☀️ Modo Día';
    } else {
        botonTema.textContent = '🌙 Modo Noche';
    }
});

const btnMenu = document.getElementById('btn-menu');
const menuPrincipal = document.getElementById('menu-principal');

btnMenu.addEventListener('click', function() {
    menuPrincipal.classList.toggle('mostrar-menu');
});

const formularioContacto = document.querySelector("#form-contacto");
const avisoContacto = document.querySelector("#aviso-contacto");

function revisarFormulario(event) {
    event.preventDefault();
    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#correo").value;
    if (nombre === "") {
        avisoContacto.textContent = "Falta tu nombre.";
        avisoContacto.classList.add("error");
        avisoContacto.classList.remove("exito");
    } else if (correo.includes("@") === false) {
        avisoContacto.textContent = "Ese correo no parece válido, le falta el símbolo de @.";
        avisoContacto.classList.add("error");
        avisoContacto.classList.remove("exito");
    } else {
        avisoContacto.textContent = "Mensaje recibido.";
        avisoContacto.classList.add("exito");
        avisoContacto.classList.remove("error");
    }
}

formularioContacto.addEventListener("submit", revisarFormulario);
