<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual de uso</title>
    <link rel="stylesheet" href="./estilos/manual.css">
    <link rel="stylesheet" href="../estilos/nav.css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        echo "No tiene autorización";
        die();
    }  
    ?>

<?php include('./template/header.php') ?>

<div class="manual-container">
    <h1>Manual de uso✅</h1>
  <div class="manual-content">
    <div class="step">
      <div class="step-number">1</div>
      <div class="step-content">
        <h2>¿Cómo editar un libro?</h2>

        <div class="carousel">
          <div class="carousel-slide active">
            <img src="./img/editar1.png" alt="Paso 1: Botón Editar">
            <p>Paso 1: Busca el libro que deseas editar para realizar los cambios necesarios.</p>
          </div>
      
          <div class="carousel-slide">
            <img src="./img/color.png" alt="Paso 2: Seleccionar libro">
            <p>Paso 2: Selecciona el libro que deseas editar de la lista.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/editar3.png" alt="Paso 3: Cambiar título">
            <p>Paso 3: Cambia el título del libro.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/editar4.png" alt="Paso 4: Cambiar el autor">
            <p>Paso 4: Cambia el autor del libro.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/editar5.png" alt="Paso 5: Cambiar descripción">
            <p>Paso 5: Cambia la descripción del libro.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/editar6.png" alt="Paso 6: Cambiar la portada">
            <p>Paso 6: Cambia la portada del libro.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/editar7.png" alt="Paso 7: Guardar">
            <p>Paso 7: Una vez realizados los cambios requeridos haz click en el botón "Guardar".</p>
          </div>
          
          <button class="prev-btn">⬅️</button>
          <button class="next-btn">➡️</button>
        </div>
      </div>
    </div>
  </div>

  <div class="manual-content">
    <div class="step">
      <div class="step-number">2</div>
      <div class="step-content">
        <h2>¿Cómo agregar un libro?</h2>
        <div class="carousel">
          <!-- Slides -->
          <div class="carousel-slide active">
            <img src="./img/agregar1.png" alt="">
            <p>Paso 1: Para agregar un libro deberás PASAR DE LARGO el botón de buscar y directamente rellenar los campos.</p>
          </div>
          <div class="carousel-slide">
            <img src="./img/editar3.png" alt="">
            <p>Paso 2: Agrega el título del libro.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/editar4.png" alt="">
            <p>Paso 3: Agrega el autor del libro.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/editar5.png" alt="">
            <p>Paso 4: Agrega la descripción del libro.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/editar6.png" alt="">
            <p>Paso 5: Agrega la portada del libro.</p>
          </div>

          <div class="carousel-slide">
            <img src="./img/agregar2.png" alt="">
            <p>Paso 6: Una vez realizados los cambios requeridos haz click en el botón "Agregar".</p>
          </div>

          <button class="prev-btn">⬅️</button>
          <button class="next-btn">➡️</button>
        </div>
      </div>
    </div>
  </div>

  <div class="manual-content">
    <div class="step">
      <div class="step-number">3</div>
      <div class="step-content">
        <h2>¿Cómo eliminar un libro?</h2>
        <div class="carousel">

          <div class="carousel-slide active">
            <img src="./img/editar1.png" alt="">
            <p>Paso 1: Busca el libro que deseas eliminar.</p>
          </div>
          <div class="carousel-slide">
            <img src="./img/color.png" alt="">
            <p>Paso 2: Selecciona el libro que deseas eliminar de la lista.</p>
          </div>
          <div class="carousel-slide">
            <img src="./img/eliminar1.png" alt="">
            <p>Paso 3: Haz click en el botón "Eliminar" para quitar el libro de la biblioteca.</p>
          </div>

          <button class="prev-btn">⬅️</button>
          <button class="next-btn">➡️</button>
        </div>
      </div>
    </div>
  </div>


</div>



<script src="./manual.js"></script>
</body>
</html>