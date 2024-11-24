function buscarLibro() {
    var query = document.getElementById('searchInput').value; // obtener el texto escrito
    var coinc_container = document.getElementById('coincidencias'); // contenedor donde mostrar las sugerencias
    
    // Limpiar las sugerencias previas
    coinc_container.innerHTML = '';

    // Si el usuario no ha escrito nada, salir
    if (query.length < 2) return; // por ejemplo, solo buscar después de 3 caracteres

    let libros = [];

    fetch('getLibros.php')
    .then(response => {
        return response.text(); // Convertir la respuesta a texto
    })
    .then(text => {
        /* console.log("Respuesta del servidor:", text); */  // Muestra lo que el servidor está enviando
        libros = JSON.parse(text); // Convertir el texto a JSON
    })
    .then(() => {
        // Filtrar libros que coincidan con el término de búsqueda
        var librosFiltrados = libros.filter(function(libro) {
            return libro.nombre_libro.toLowerCase().includes(query.toLowerCase());
        });

        // Mostrar las sugerencias
        librosFiltrados.forEach(function(libro) {
            var div = document.createElement('div');
            div.textContent = libro.nombre_libro; // Mostrar el nombre del libro
            div.onclick = function() {
                document.getElementById('searchInput').value = libro.nombre_libro; // completar el campo con el libro seleccionado
                coinc_container.innerHTML = ''; // limpiar las sugerencias
            };
            coinc_container.appendChild(div);
        });
    })
    .catch(error => console.error('Error al cargar los libros:', error));
}