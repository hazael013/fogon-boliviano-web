const boton = document.querySelector("#btn-confirmar");
const mensaje = document.querySelector("#mensaje");

boton.addEventListener("click", function() {
    mensaje.textContent = "Pedido recibido, te atiende 👤Hazael Fernando Alanoca Alarcon";
    mensaje.classList.remove("oculto");
});
