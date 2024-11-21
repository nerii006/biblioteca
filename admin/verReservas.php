<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="../estilos/general.css">
    <link rel="stylesheet" href="../estilos/nav.css">
    <link rel="stylesheet" href="./estilos/verReservas.css">
</head>
<body>
    
<?php include('./template/header.php') ?>
    
 <div class="container">
    
    <h1>Reservas!!</h1>

    <div class="card-container">
  <div class="card">
    <img src="../img/portadas/1984.png" alt="Portada del libro" class="Portadas">
    <div class="card-content">
      <h3 class="card-title">Título</h3>
      <p class="card-author">Autor:</p>
      <p class="card-description">Descripción.</p>
      <p class="card-reservation">Reservado por: Juan Pérez</p>
      <div class="card-buttons">
        <button class="btn reserved">Reservado</button>
        <button class="btn taken">Tomado</button>
        <button class="btn free">Libre</button>
      </div>
    </div>
  </div>


  <div class="card">
    <img src="../img/portadas/1984.png" alt="Portada del libro" class="Portadas">
    <div class="card-content">
      <h3 class="card-title">Título</h3>
      <p class="card-author">Autor:</p>
      <p class="card-description">Descripción.</p>
      <p class="card-reservation">Reservado por: Ana García</p>
      <div class="card-buttons">
        <button class="btn reserved">Reservado</button>
        <button class="btn taken">Tomado</button>
        <button class="btn free">Libre</button>
      </div>
    </div>
  </div>


  <div class="card">
    <img src="../img/portadas/1984.png" alt="Portada del libro" class="Portadas">
    <div class="card-content">
      <h3 class="card-title">Título</h3>
      <p class="card-author">Autor:</p>
      <p class="card-description">Descripción.</p>
      <p class="card-reservation">Reservado por: Pedro López</p>
      <div class="card-buttons">
        <button class="btn reserved">Reservado</button>
        <button class="btn taken">Tomado</button>
        <button class="btn free">Libre</button>
      </div>
    </div>
  </div>
  </div>
 </div>






</body>
</html>