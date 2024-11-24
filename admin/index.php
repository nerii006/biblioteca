<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión Admin</title>
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/nav.css">
    <link rel="stylesheet" href="../estilos/footer.css">
    <link rel="stylesheet" href="../estilos/form.css">
</head>
<body>

    <?php 
    include('./template/header.php');

    include('../conexion.php');

    if ($_POST) {
        /* $query = $conexion->prepare("SELECT * FROM alumnos WHERE dni_alumno = :dni");
        $query->bindParam(':dni', $_POST['dni']);
        $query->execute();
        $checkDNI = $query->fetch(PDO::FETCH_LAZY);
        $query = $conexion->prepare("SELECT * FROM alumnos WHERE contrasena_alumno = :clave");
        $query->bindParam(':clave', $_POST['password']);
        $query->execute();
        $checkPassword = $query->fetch(PDO::FETCH_LAZY); */
        
        $query = $conexion->prepare("SELECT * FROM administradores WHERE nombre_admin = :nombre AND contrasena_admin = :clave");
        $query->bindParam(':nombre', $_POST['username']);
        $query->bindParam(':clave', $_POST['password']);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_LAZY);

        if (!empty($usuario)) {
                    session_start();
                    $query = $conexion->prepare("SELECT * FROM administradores WHERE contrasena_admin = :clave");
                    $query->bindParam(':clave', $_POST['password']);
                    $query->execute();
                    $usuario = $query->fetch(PDO::FETCH_LAZY);
                    $_SESSION['usuario'] = $usuario['nombre_admin'];
                    header('Location:editar.php');  
        } else {
            $mensaje = "ERROR: Los datos ingresados son incorrectos";
        }
    }
    ?>
<div class="siseve">

    <div class="formcontenedor">
                <h1>Ingreso del bibliotecario</h1><br>
                <form method="post" class="form">
                    <h2>Inicio de Sesión</h2> 
                    <?php  if (isset($mensaje)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>         
                        </div>
                    <?php } ?>
                    <label for="Nombre">Nombre de usuario:</label>
                    <input type="text" name="username" id="username" placeholder="Nombre de usuario" required>
                    <br>
                 
                    <label for="Contraseña">Contraseña:</label>
                    <input type="password" name="password" id="password" placeholder="Contraseña" required>
                    <br>
                    <button type="submit">Iniciar sesión</button>
                    <br>
                </form> 
    </div>

</div>  
    <?php include('./template/footer.php') ?>
</body>
</html>