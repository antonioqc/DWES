<?php
 $nombre = "Antonio";
 $apellidos = "Quesada Cuadrado";
 $img = "img/imagen.jpg";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section>
    <?php
        echo "<b><h2>Mi ficha personal</h2></b>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Apellidos: $apellidos</p>";
        echo "<p>Foto: <img src= $img width= 100px></img></p>";
    ?>
</section>
</body>
</html>
