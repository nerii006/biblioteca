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
            
            $query = $conexion->prepare("SELECT * FROM generos INNER JOIN libros ON libros.genero_id = generos.id_genero WHERE libros.nombre_libro = :nombre_libro");
            $query->bindParam(':nombre_libro', $txtBusqueda);
            $query->execute();
            $genero_ = $query->fetch(PDO::FETCH_LAZY);

            $titulo = isset($libro['nombre_libro'])?$libro['nombre_libro']:"";
            $descripcion = isset($libro['desc_libro'])?$libro['desc_libro']:"";
            $rutaImg = isset($libro['portada_libro'])?$libro['portada_libro']:"";
            $autorNombre = isset($autor['nombre_autor'])?$autor['nombre_autor']:"";
            $genero = isset($genero_['genero'])?$genero_['genero']:"";
            $id_libro = isset($libro['id_libro'])?$libro['id_libro']:"";
            break;
        /* case 'editar':
            $query = $conexion->prepare("SELECT * FROM libros WHERE id_libro = :id");
            $query->bindParam(':id', $id_libro);
            $query->execute();
            $libro_original = $query->fetch(PDO::FETCH_LAZY);
            $nombre_libro = isset($_POST['titulo'])?$_POST['titulo']:"";
            $nombre_autor = isset($_POST['nombre_autor'])?$_POST['nombre_autor']:"";
            $desc_libro = isset($_POST['descripcion'])?$_POST['descripcion']:"";
            $query = $conexion->prepare("UPDATE libros SET nombre_libro='',desc_libro='',autor_id='',portada_libro='' ")
            break; */
        case 'agregar':
            $txtTitulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
    $txtNombreAutor = isset($_POST['nombre_autor']) ? $_POST['nombre_autor'] : "";
    $txtDesc = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
    $txtGenero = isset($_POST['generos']) ? $_POST['generos'] : "";
    $img = isset($_FILES['portada']['name']) ? $_FILES['portada']['name'] : "";

    // Definir nombre del archivo de imagen
    $fecha = new DateTime();
    $nombreArchivo = ($img != "") ? $fecha->getTimestamp() . "_" . $_FILES['portada']['name'] : "imagen.jpg";

    $tmpImg = $_FILES['portada']['tmp_name'];
    if ($tmpImg != "") {
        move_uploaded_file($tmpImg, "../img/portadas/" . $nombreArchivo);
    }

    // Verificar si el libro ya existe
    $query = $conexion->prepare("SELECT * FROM libros WHERE nombre_libro = :nombre_libro");
    $query->bindParam(':nombre_libro', $txtTitulo);
    $query->execute();
    $existe_libro = $query->fetch(PDO::FETCH_LAZY);

    if (empty($existe_libro)) {
        // Verificar si el autor ya existe
        $query = $conexion->prepare("SELECT * FROM autores WHERE nombre_autor = :nombre_autor");
        $query->bindParam(':nombre_autor', $txtNombreAutor);
        $query->execute();
        $existe_autor = $query->fetch(PDO::FETCH_LAZY);

        if (empty($existe_autor)) {
            // Insertar un nuevo autor
            $query = $conexion->prepare("INSERT INTO autores(nombre_autor, nacion_id) VALUES (:nombre_autor, 1)");
            $query->bindParam(':nombre_autor', $txtNombreAutor);
            $query->execute();
        }

        // Obtener el ID del autor
        $obtenerAutor = $conexion->prepare("SELECT * FROM autores WHERE nombre_autor = :nombre_autor");
        $obtenerAutor->bindParam(':nombre_autor', $txtNombreAutor);
        $obtenerAutor->execute();
        $id_autor = $obtenerAutor->fetch(PDO::FETCH_LAZY)['id_autor'];

        // Obtener el ID del género
        $obtenerGenero = $conexion->prepare("SELECT * FROM generos WHERE genero = :genero");
        $obtenerGenero->bindParam(':genero', $txtGenero);
        $obtenerGenero->execute();
        $id_genero = $obtenerGenero->fetch(PDO::FETCH_LAZY)['id_genero'];

        // Insertar el libro
        $query = $conexion->prepare("INSERT INTO libros(nombre_libro, desc_libro, autor_id, estado_id, genero_id, portada_libro) VALUES (:nombre_libro, :desc_libro, :autor_id, 1, :genero_id, :portada_libro)");
        $query->bindParam(':nombre_libro', $txtTitulo);
        $query->bindParam(':desc_libro', $txtDesc);
        $query->bindParam(':autor_id', $id_autor);
        $query->bindParam(':genero_id', $id_genero);
        $query->bindParam(':portada_libro', $nombreArchivo);

        $query->execute();
    } else {
        $mensaje_libroExiste = "Ya existe un libro con ese nombre";
    }
            
           /*  $query = $conexion->prepare("INSERT INTO")
            $query->bindParam(':img', $nombreArchivo);
            
            $query->execute();  */

        default: echo "nada";
    

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
                        <script src="./script.js"></script>
                        <br><br>
                        <form id="book-form" method="POST" enctype="multipart/form-data">
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
                        <input type="file" name="portada" id="portada">
                    </div>
                </div>

                <div class="right-form">
                    <h2>Portada:</h2>
                    <div class="portada">
                        <img src="<?php if($rutaImg) echo '../img/portadas/'.$rutaImg; ?>" alt="">
                    </div>
                    <br>
                    <label for="generos">Selecciona un género</label>
                    <?php 
                    $query = $conexion->prepare("SELECT * FROM generos");
                    $query->execute();
                    $generos = $query->fetchAll(PDO::FETCH_ASSOC);
                    if (!empty($generos)) {
                    ?>
                    <select name="generos" id="generos">
                        <?php foreach ($generos as $g) { ?>
                            <option value="<?php echo $g['genero']; ?>" <?php if(!empty($genero_)){if($g['id_genero'] == $genero_['id_genero']) { echo "selected"; }} ?>><?php echo $g['genero']; ?></option>
                        <?php }} ?>
                    </select>
                </div>

                </div>
                
                <div class="button-group">
                    <button type="submit" class="save-btn" name="accion" value="editar" <?php echo ($accion != "buscar") ? "disabled" : ""; ?>>Editar</button>
                    <button type="submit" class="add-btn" name="accion" value="agregar" <?php echo ($accion == "buscar") ? "disabled" : ""; ?>>Agregar</button>
                    <button type="submit" class="delete-btn" name="accion" value="eliminar" <?php echo ($accion != "buscar") ? "disabled" : ""; ?>>Eliminar</button>
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
        <?php 
        if (isset($mensaje_libroExiste)) {
            echo $mensaje_libroExiste;
        }
        ?>
    </div>
</body>
</html>
