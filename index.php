<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="./estilos/general.css">
    <link rel="stylesheet" href="./estilos/nav.css">
    <link rel="stylesheet" href="./estilos/form.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <img id="logo" src="./img/logoenet.png" alt="">
            <a href="#">Libros</a>
            <a href="#">Mis Reservas</a>
            <a href="#">Manual de Uso</a>
            <a href="#contacto">Contacto</a>                    
        </nav>
    </header>

    <div class="formcontenedor">
    <h1>¡Bienvenido a la página de la Biblioteca Escolar!</h1>
    <h2>Registrate</h2>
    
        <form method="post" action="login" class="form"> 
            <label for="Nombre">Nombre de usuario:</label>
            <input type="text" id="nombre" placeholder="Nombre de Usuario" required>
            <br>

            <label for="Nombre">DNI:</label>
            <input type="text" id="dni" placeholder="DNI" required>
            <br>
         
            <label for="Contraseña">Contraseña:</label>
            <input type="password" id="contrasena" placeholder="Contraseña" required>
            <br>
            <button type="button" onclick="registro()">Registrarse</button>
        </form>
        <h3></h3>
    </div>
</body>
</html>