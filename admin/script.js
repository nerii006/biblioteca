function buscarLibro() {
    var query = document.getElementById('searchInput').value; // obtener el texto escrito
    var coinc_container = document.getElementById('coincidencias'); // contenedor donde mostrar las sugerencias
    
    // Limpiar las sugerencias previas
    coinc_container.innerHTML = '';

    // Si el usuario no ha escrito nada, salir
    if (query.length < 3) return; // por ejemplo, solo buscar después de 3 caracteres

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


/* function previewImage() {
    const coverInput = document.getElementById('book-cover').value;
    const coverPreview = document.getElementById('cover-preview');

    if (coverInput) {
        coverPreview.src = coverInput;
        coverPreview.style.display = 'block';
    } else {
        coverPreview.style.display = 'none';
    }
}

function displayResults(action) {
    const title = document.getElementById('book-title').value;
    const author = document.getElementById('book-author').value;
    const description = document.getElementById('book-description').value;
    const cover = document.getElementById('book-cover').value;

    const results = document.getElementById('results');
    const resultTitle = document.getElementById('result-title').querySelector('span');
    const resultAuthor = document.getElementById('result-author').querySelector('span');
    const resultDescription = document.getElementById('result-description').querySelector('span');
    const resultCover = document.getElementById('result-cover');

    resultTitle.textContent = title;
    resultAuthor.textContent = author;
    resultDescription.textContent = description;

    if (cover) {
        resultCover.src = cover;
        resultCover.style.display = 'block';
    } else {
        resultCover.style.display = 'none';
    }

    results.style.display = 'block';
    alert(`Libro "${title}" ${action} correctamente.`);
}

function saveBook() {
    const title = document.getElementById('book-title').value;
    const author = document.getElementById('book-author').value;
    const description = document.getElementById('book-description').value;
    const cover = document.getElementById('book-cover').value;

    if (title && author && description && cover) {
        displayResults("actualizado");
    } else {
        alert('Por favor, completa todos los campos antes de guardar.');
    }
}

function addBook() {
    const title = document.getElementById('book-title').value;
    const author = document.getElementById('book-author').value;
    const description = document.getElementById('book-description').value;
    const cover = document.getElementById('book-cover').value;

    if (title && author && description && cover) {
        displayResults("agregado");
    } else {
        alert('Por favor, completa todos los campos antes de agregar.');
    }
}

function deleteBook() {
    const title = document.getElementById('book-title').value;

    if (title) {
        alert(`¿Seguro que deseas eliminar el libro "${title}"?`);
        document.getElementById('results').style.display = 'none';
    } else {
        alert('Por favor, ingresa el título del libro que deseas eliminar.');
    }
}

 */