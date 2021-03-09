<?php

/**
 * Ejemplo examen 2019-2020
 * 
 * Autor: Antonio Quesada Cuadrado
 */

session_start();

function clearData($cadena)
{
    $cadenaLimpia = htmlspecialchars($cadena);
    $cadenaLimpia = trim($cadenaLimpia);  // para quitar espacios al principio y al final
    $cadenaLimpia = stripslashes($cadenaLimpia); // para quitar las barras de un string
    return $cadenaLimpia;
}

//Inicialización variables
$anoticias = array(
    "videojuegos" => array("videojuego1", "videojuego2", "videojuego3"),
    "literatura" => array("literatura1", "literatura2"),
    "cine" => array("cine1", "cine2", "cine3", "cine4"),
    "series" => array("series1,series2")
);
$procesaFormulario = false;

//Comprobamos si no exiten las variables de session
if (!isset($_SESSION['noticias'])) {
    $_SESSION['noticias'] = array();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    foreach ($anoticias as $key => $value) {
        echo "<label for = ' . \"$key\" . '></label>";
        echo $key . "<input type=\"checkbox\" id=$key  name=\"noticias[]\" value=$key>";
    }

    echo "<input type=\"submit\" name=\"enviar\" value =\"enviar\" >";
    echo "</form>";

    if (isset($_POST["enviar"])) {
        foreach ($_POST["noticias"] as $selected) {
            foreach ($anoticias[$selected] as $value) {
                echo "<p>$value</p>";
            }
        }
    }

    echo "</br>";
    echo "<a href=\"cierresesion.php\">Cerrar Sesión</a>";
    ?>
</body>
</html>