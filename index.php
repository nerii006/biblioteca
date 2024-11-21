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
    <link rel="stylesheet" href="./estilos/footer.css">
    <link rel="stylesheet" href="./estilos/form.css">
</head>
<?php
    if ($_POST) {
       /*  $query = $conexion->prepare("SELECT * FROM alumnos");
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
 */

        
    }
    if ($_POST) {
        $query = $conexion->prepare("SELECT * FROM alumnos WHERE nombre_alumno = :nombre");
        $query->bindParam(':nombre', $_POST['username']);
        $query->execute();
        $checkUsername = $query->fetch(PDO::FETCH_LAZY);
        $query = $conexion->prepare("SELECT * FROM alumnos WHERE dni_alumno = :dni");
        $query->bindParam(':dni', $_POST['dni']);
        $query->execute();
        $checkDNI = $query->fetch(PDO::FETCH_LAZY);
    
        if (empty($checkUsername)) {
            if (empty($checkDNI)) {
                $query = $conexion->prepare("INSERT INTO alumnos(nombre_alumno, dni_alumno, contrasena_alumno) VALUES (:username, :dni, :clave)");
                $query->bindparam(":username", $_POST['username']);
                $query->bindparam(":dni", $_POST['dni']);
                $query->bindparam(":clave", $_POST['password']);
                $query->execute();

                $query = $conexion->prepare("SELECT * FROM alumnos ORDER BY id_alumno DESC LIMIT 1");
                $query->execute();
                $usuario = $query->fetch(PDO::FETCH_LAZY);
                session_start();
                $_SESSION['usuario'] = $usuario['nombre_alumno'];
                $_SESSION['id_usuario'] = $usuario['id_alumno'];

                header('Location:libros.php');
            } else {
                $mensajeDNI = "El DNI ingresado ya está en uso";
            }
        } else {
            $mensajeUsername = "El nombre de usuario ya está en uso";
        }
    }
?>

<body>
   <?php include('template/header.php') ?>
<div class="siseve">
    <div class="formcontenedor">
    <h1>¡Bienvenido a la página de la Biblioteca Escolar!</h1><br>
        <form method="post" class="form">
            <h2>Registrate</h2> 
            <?php  if (isset($mensajeDNI)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensajeDNI; ?>         
                </div>
            <?php } if (isset($mensajeUsername)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensajeUsername; ?>         
                </div>
            <?php } ?>
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
            <h4>Si ya tienes una cuenta haz <a href="inicioSesion.php">Click aquí</a> para Iniciar sesión</h4>
        </form> 
    </div>
</div>
    
    <?php include('./template/footer.php') ?>
</body>
</html>