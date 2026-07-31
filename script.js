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
