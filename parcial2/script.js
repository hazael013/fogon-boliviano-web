const formulario = document.querySelector("#form-helados");
const aviso = document.querySelector("#aviso-helados");

formulario.addEventListener("submit", function(event) {
    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#correo").value;

    if (nombre === "" || correo === "") {
        aviso.textContent = "Falta tu nombre.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
        event.preventDefault();
    } else if (!correo.includes("@")) {
        aviso.textContent = "Ese correo no tiene @.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
        event.preventDefault();
    } else {
        aviso.textContent = "Pedido anotado, te atiende Hazael Fernando Alanoca Alarcon";
        aviso.classList.add("exito");
        aviso.classList.remove("error");
    }
});
