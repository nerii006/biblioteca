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

   <?php include('./template/header.php') ?>
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