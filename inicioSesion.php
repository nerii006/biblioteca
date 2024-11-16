<?php
    include('./conexion.php');

    if ($_POST) {
        /* $query = $conexion->prepare("SELECT * FROM alumnos WHERE dni_alumno = :dni");
        $query->bindParam(':dni', $_POST['dni']);
        $query->execute();
        $checkDNI = $query->fetch(PDO::FETCH_LAZY);
        $query = $conexion->prepare("SELECT * FROM alumnos WHERE contrasena_alumno = :clave");
        $query->bindParam(':clave', $_POST['password']);
        $query->execute();
        $checkPassword = $query->fetch(PDO::FETCH_LAZY); */
        
        $query = $conexion->prepare("SELECT * FROM alumnos WHERE dni_alumno = :dni AND contrasena_alumno = :clave");
        $query->bindParam(':dni', $_POST['dni']);
        $query->bindParam(':clave', $_POST['password']);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_LAZY);

        if (!empty($usuario)) {
                    session_start();
                    $_SESSION['check'] = "ok";
                    $query = $conexion->prepare("SELECT * FROM alumnos WHERE dni_alumno = :dni");
                    $query->bindParam(':dni', $_POST['dni']);
                    $query->execute();
                    $usuario = $query->fetch(PDO::FETCH_LAZY);
                    $_SESSION['usuario'] = $usuario['nombre_alumno'];
                    header('Location:libros.php');  
        } else {
            $mensaje = "ERROR: El DNI o contraseña ingresados son incorrectos";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="./estilos/general.css">
    <link rel="stylesheet" href="./estilos/nav.css">
    <link rel="stylesheet" href="./estilos/footer.css">
    <link rel="stylesheet" href="./estilos/form.css">

</head>

<body>
   <?php include('template/header.php') ?>
<div class="siseve">
    <div class="formcontenedor">
            <h1>¡Bienvenido a la página de la Biblioteca Escolar!</h1><br>
                <form method="post" class="form">
                    <h2>Inicio de Sesión</h2> 
                    <?php  if (isset($mensaje)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>         
                        </div>
                    <?php } ?>
                    <label for="DNI">DNI:</label>
                    <input type="text" name="dni" id="dni" placeholder="DNI" required>
                    <br>
                 
                    <label for="Contraseña">Contraseña:</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña" required>
                    <br>
                    <button type="submit">Iniciar sesión</button>
                    <br>
                    <h4>Si no tienes una cuenta haz <a href="index.php">Click aquí</a> para registrarse</h4>
                </form> 
    </div>
</div>
    
    <?php include('./template/footer.php') ?>
</body>
</html>