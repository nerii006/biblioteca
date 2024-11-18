function previewImage() {
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

