<header>
    <nav class="navbar">
        <div class="nombreUsuario">
            <?php
            session_start();
            if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != 'admin') {
                session_destroy();
            } else if (isset($_SESSION['usuario'])) {
                echo $_SESSION['usuario'];
            }
            ?>
        </div>
        <div class="opciones">
            <img id="logo" src="../img/logoenet.png" alt="">

            <a href="./editar.php">Administrar libros</a>
            <a href="./manualuso.php">Manual de uso</a>
            <a href="./verReservas.php">Ver reservas</a>
            <a href="cerrarSesion.php">Cerrar sesión</a>
        </div>

    </nav>
</header>