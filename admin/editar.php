<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libros</title>
    <link rel="stylesheet" href="./estilos/editar.css">
</head>
<body>

    <div class="contenedor">
        <div class="form-container">
            <h2>Editar Libro</h2><br>
            <form id="book-form">
                <div class="form-group">
                    <label for="book-title">Título</label>
                    <input type="text" id="book-title" placeholder="Ingresa el título del libro">
                </div>
                <div class="form-group">
                    <label for="book-author">Autor</label>
                    <input type="text" id="book-author" placeholder="Ingresa el autor">
                </div>
                <div class="form-group">
                    <label for="book-description">Descripción</label>
                    <textarea id="book-description" rows="3" placeholder="Escribe una descripción"></textarea>
                </div>
                <div class="form-group">
                    <label for="book-cover">Imagen de Portada (URL)</label>
                    <input type="text" id="book-cover" placeholder="Ingresa la URL de la imagen" oninput="previewImage()">
                    <div id="cover-preview-container" style="text-align: center; margin-top: 10px;">
                        <img id="cover-preview" src="" alt="Vista previa de la portada" style="max-width: 100%; height: auto; display: none; border: 1px solid #ccc; padding: 5px;">
                    </div>
                </div>
                <div class="button-group">
                    <button type="button" class="save-btn" onclick="saveBook()">Guardar</button>
                    <button type="button" class="delete-btn" onclick="deleteBook()">Eliminar</button>
                    <button type="button" class="add-btn" onclick="addBook()">Agregar</button>
                </div>
            </form>
        </div>
        <div id="results">
            <h3>Resultados</h3>
            <p id="result-title"><strong>Título:</strong> <span></span></p>
            <p id="result-author"><strong>Autor:</strong> <span></span></p>
            <p id="result-description"><strong>Descripción:</strong> <span></span></p>
            <img id="result-cover" src="" alt="Portada" style="max-width: 100%; height: auto; display: none;">
        </div>
    </div>
    <script src="./script.js"></script>
</body>
</html>
