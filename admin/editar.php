<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libros</title>
    <link rel="stylesheet" href="./estilos/editar.css">
    <link rel="stylesheet" href="../estilos/nav.css">
</head>
<body>

<?php include('./template/header.php') ?>

    <div class="contenedor">
        <div class="form-container">
            <h3>Editar-Agregar-Eliminar Libros</h3><br>
            <form id="book-form">
                <div class="form-content">
                <div class="left-form">
                    <div class="form-group">
                        <input type="text" id="titulo" placeholder="Buscar libro"><br><br>
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
                        <label for="book-cover">Imagen de Portada</label>
                        <input type="file" name="" id="">
                    </div>
                </div>

                <div class="right-form">
                    <h2>Portada:</h2>
                    <div class="portada"></div>
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
