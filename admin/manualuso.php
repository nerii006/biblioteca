<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual de uso</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        echo "No tiene autorización";
        die();
    }  
    ?>
    
</body>
</html>