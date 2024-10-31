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
<body>
    <header>
        <nav class="navbar">
            <img id="logo" src="./img/logoenet.png" alt="">
            <a href="./libros.php">Libros</a>
            <a href="./reservas.php">Mis Reservas</a>
            <a href="#contacto">Contacto</a>                    
        </nav>
    </header>

    <div class="formcontenedor">
    <h1>¡Bienvenido a la página de la Biblioteca Escolar!</h1><br>

    
        <form method="post" action="login" class="form">
            <h2>Registrate</h2> 
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
            <br>
            <h4>Si ya tienes una cuenta haz <a href="">Click aquí</a> para Iniciar sesión</h4>
        </form> 

    </div>

    <footer>
            <div id="contacto" class="footer-content">
                <h3>HAPPY HOUR</h3>
                <p>El mejor lugar para disfrutar de comidas ríquisimas y pasar momentos inolvidables. ¡Te esperamos!</p>
                <ul class="socials">
                    <li><a href="https://www.facebook.com/?locale=es_LA"><img src="img/BiFacebook.svg" alt="Facebook"></a></li>
                    <li><a href="#"><img src="img/WhhCallalt.svg" alt="Numero"></a>03385-406682</li>
                    <li><a href="https://www.instagram.com/"><img src="img/BiInstagram.svg" alt="Instagram"></a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 HAPPY HOUR | Todos los derechos reservados.</p>
            </div>
        </footer>
</body>
</html>