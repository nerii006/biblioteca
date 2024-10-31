function mostrarlibros(opcion) {
    const libros = document.querySelectorAll('.menu-item');
    libros.forEach(menu => menu.style.display = 'none');
    const menuSeleccionado = document.getElementById(opcion);
    if (menuSeleccionado) {
        menuSeleccionado.style.display = 'block';
    }
}