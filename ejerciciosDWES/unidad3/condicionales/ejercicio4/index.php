<?php
/**
 * Cabecera en función de la estación del año.
 * Autor: Antonio Quesada Cuadrado
 * 
 * Yo he hecho que segun la fecha en la que estemos cojo el mes y dia con date
 * y con un switch pues voy viendo a que estacion pertenece y pongo una foto
 * de la estación
 */

/*     $mes = date("n");
    $dia = date("d"); */
    $mes = 8;
    $dia = 12;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        if (($dia>=21 && $mes>=3) || ($dia<21 && $mes <=6)) {
            echo "<header class = 'primavera'><h1>primavera</h1></header>";
        } elseif (($dia>=21 && $mes>=6) || ($dia<22 && $mes <=9)) {
            echo "<header class = 'verano'><h1>verano</h1></header>";
        } elseif (($dia>=22 && $mes>=9) || ($dia<21 && $mes <=12)) {
            echo "<header class = 'otonno'><h1>otoño</h1></header>";
        } else {
            echo "<header class = 'invierno'><h1>invierno</h1></header>";
        }
    ?>  
</body>
</html>