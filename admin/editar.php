<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Libros</title>
    <link rel="stylesheet" href="./estilos/editar.css">
    <link rel="stylesheet" href="../estilos/nav.css">
</head>
<body>
<?php include('./template/header.php') ?>
<?php 
if (!isset($_SESSION['usuario'])) {
    echo "No tiene autorización";
    die();
} 

include('../conexion.php');

if ($_POST) {
    $accion = (isset($_POST['accion'])?$_POST['accion']:"");
    $txtBusqueda = (isset($_POST['inputBuscar'])?$_POST['inputBuscar']:"");

    switch ($accion) {
        case 'buscar':
            $query = $conexion->prepare("SELECT * FROM libros INNER JOIN autores ON autores.id_autor = libros.autor_id WHERE libros.nombre_libro = :nombre_libro");
            $query->bindParam(':nombre_libro', $txtBusqueda);
            $query->execute();
            $libro = $query->fetch(PDO::FETCH_LAZY);
            if (empty($libro)) {
                $mensaje = "Ese libro no está en la biblioteca";
            }
            $query = $conexion->prepare("SELECT * FROM autores INNER JOIN libros ON libros.autor_id = autores.id_autor WHERE libros.nombre_libro = :nombre_libro");
            $query->bindParam(':nombre_libro', $txtBusqueda);
            $query->execute();
            $autor = $query->fetch(PDO::FETCH_LAZY);

            $titulo = isset($libro['nombre_libro'])?$libro['nombre_libro']:"";
            $descripcion = isset($libro['desc_libro'])?$libro['desc_libro']:"";
            $rutaImg = isset($libro['portada_libro'])?$libro['portada_libro']:"";
            $autorNombre = isset($autor['nombre_autor'])?$autor['nombre_autor']:"";
            $id_libro = isset($libro['id_libro'])?$libro['id_libro']:"";
            break;
        /* case 'guardar':
            $query = $conexion->prepare("SELECT * FROM libros WHERE id_libro = :id");
            $query->bindParam(':id', $id_libro);
            $query->execute();
            $libro_original = $query->fetch(PDO::FETCH_LAZY);
            $nombre_libro = isset($_POST['titulo'])?$_POST['titulo']:"";
            $nombre_autor = isset($_POST['nombre_autor'])?$_POST['nombre_autor']:"";
            $desc_libro = isset($_POST['descripcion'])?$_POST['descripcion']:"";
            $query = $conexion->prepare("UPDATE libros SET nombre_libro='',desc_libro='',autor_id='',portada_libro='' ")
            break; */
        /* case 'agregar':
            $txtTitulo = $_POST['titulo'];
            $txtNombreAutor = $_POST['nombre_autor'];
            $txtDesc = $_POST['descripcion'];

            $query = $conexion->prepare("INSERT INTO libros(") */
        default: echo "nada";
    }

}
?>

    <div class="contenedor">
        <div class="form-container">
            <h3>Editar-Agregar-Eliminar Libros</h3><br>
                <div class="form-content">
                <div class="left-form">
                    <div class="form-group">
                        <div class="buscarSection">
                            <form method="POST">
                                <input name="inputBuscar" type="text" id="searchInput" placeholder="Buscar libro" onkeyup="buscarLibro()">
                                <button name="accion" value="buscar" id="buscarBtn">
                                    <img src="./img/buscarIcon.png" alt="">
                                </button>
                            </form>
                            <?php if(isset($mensaje)) { echo $mensaje; }?>
                                
                        </div>
                        <div id="coincidencias"></div>
                        <br><br>
                        <form id="book-form" method="POST">
                        <label for="book-title">Título</label>
                        <input name="titulo" type="text" id="book-title" required placeholder="Ingresa el título del libro" <?php if(isset($titulo)) echo 'value="'.$titulo.'"';  ?>>
                    </div>
                    <div class="form-group">
                        <label for="book-author">Autor</label>
                        <input name="nombre_autor" type="text" id="book-author" required placeholder="Ingresa el autor" <?php if(isset($autorNombre)) echo 'value="'.$autorNombre.'"';  ?>>
                    </div>
                    <div class="form-group">
                        <label for="book-description">Descripción</label>
                        <textarea name="descripcion" id="book-description" rows="3" required placeholder="Escribe una descripción"><?php if(isset($descripcion)) echo $descripcion; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="book-cover">Imagen de Portada</label>
                        <input type="file" name="" id="">
                    </div>
                </div>

                <div class="right-form">
                    <h2>Portada:</h2>
                    <div class="portada">
                        <img src="<?php if($rutaImg) echo '../img/portadas/'.$rutaImg; ?>" alt="">
                    </div>
                </div>

                </div>
                
                <div class="button-group">
                    <button type="submit" class="save-btn" name="accion" value="guardar">Guardar</button>
                    <button type="submit" class="delete-btn" name="accion" value="eliminar">Eliminar</button>
                    <button type="submit" class="add-btn" name="accion" value="agregar">Agregar</button>
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
