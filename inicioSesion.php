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
       /*$query = $conexion->prepare("SELECT * FROM alumnos");
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
 */

        $query = $conexion->prepare("SELECT * FROM alumnos");
        $query->execute();
        $alumnos = $query->fetchAll(PDO::FETCH_ASSOC);

        
       foreach ($alumnos as $alumno) {
        if(($_POST['password'] == $alumno['contrasena_alumno']) && ($_POST['dni'] == $alumno['dni_alumno'])) {
            echo "Inicio de sesion";
        } else {
            echo "ERRORR!!";
        }
       } 


       /*  $query = $conexion->prepare("INSERT INTO alumnos(nombre_alumno, dni_alumno, contrasena_alumno) VALUES (:username, :dni, :clave)");
        $query->bindparam(":username", $_POST['username']);
        $query->bindparam(":dni", $_POST['dni']);
        $query->bindparam(":clave", $_POST['password']);
        $query->execute();

        header('Location:libros.php'); */
    }
?>

<body>
   <?php include('template/header.php') ?>
<div class="siseve">
</div>
    <div class="formcontenedor">
            <h1>¡Bienvenido a la página de la Biblioteca Escolar!</h1><br>
        
            
                <form method="post" class="form">
                    <h2>Inicio de Sesión</h2> 
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
    
    <?php include('./template/footer.php') ?>
</body>
</html>