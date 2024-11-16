<header>
    <nav class="navbar">
        <div class="nombreUsuario">
            <?php
            session_start();
            if (isset($_SESSION['usuario'])) {
                echo $_SESSION['usuario'];
            }
            ?>
        </div>
        <div class="opciones">
            <img id="logo" src="./img/logoenet.png" alt="">

            <a href="./libros.php">Libros</a>
            <a href="./reservas.php">Mis Reservas</a>
            <a href="./manuso.php">Manual de uso</a>
            <?php if (!isset($_SESSION['usuario'])) { ?>
                <a href="../bibliotecaPomazan/inicioSesion.php">Iniciar sesión</a>
                <a href="../bibliotecaPomazan/index.php">Registrarse</a>
              <?php } if (isset($_SESSION['usuario'])) {?>
                <a href="cerrarSesion.php">Cerrar sesión</a>
              <?php } ?>
        </div>

    </nav>
</header>