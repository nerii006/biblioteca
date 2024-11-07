<?php
    include('./conexion.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="./estilos/general.css">
    <link rel="stylesheet" href="./estilos/nav.css">
    <link rel="stylesheet" href="./estilos/form.css">
    <link rel="stylesheet" href="./estilos/footer.css">
</head>
<?php
    if ($_POST) {
       /*  $query = $conexion->prepare("SELECT * FROM alumnos");
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
 */
        $query = $conexion->prepare("INSERT INTO alumnos(nombre_alumno, dni_alumno, contrasena_alumno) VALUES (:username, :dni, :clave)");
        $query->bindparam(":username", $_POST['username']);
        $query->bindparam(":dni", $_POST['dni']);
        $query->bindparam(":clave", $_POST['password']);
        $query->execute();

        header('Location:libros.php');
    }
?>

<body>
   <?php include('template/header.php') ?>
<div class="siseve">
</div>
    <div class="formcontenedor">
    <h1>¡Bienvenido a la página de la Biblioteca Escolar!</h1><br>

    
        <form method="post" class="form">
            <h2>Registrate</h2> 
            <label for="Nombre">Nombre de usuario:</label>
            <input type="text" name="username" id="username" placeholder="Nombre de Usuario" required>
            <br>

            <label for="DNI">DNI:</label>
            <input type="text" name="dni" id="dni" placeholder="DNI" required>
            <br>
         
            <label for="Contraseña">Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Contraseña" required>
            <br>
            <button type="submit">Registrarse</button>
            <br>
            <h4>Si ya tienes una cuenta haz <a href="">Click aquí</a> para Iniciar sesión</h4>
        </form> 

    </div>
    
    <?php include('./template/footer.php') ?>
</body>
</html>