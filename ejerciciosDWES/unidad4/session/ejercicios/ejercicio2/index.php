<?php

/**
 * 2. Crear una pequeña aplicación que permita la gestión académica del módulo de DWES.
 * Interesa almacenar las notas de cada trimestre y mostrar un informe con la nota media.
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
$nombre = "";
$notaprimertrim = "";
$notasegundotrim = "";
$notatercertrim = "";
$notamediaalumno = "";
$msgError = "";
$procesaFormulario = false;

//Comprobamos si no exiten las variables de session
if (!isset($_SESSION['nombre'])) {
    $_SESSION['nombre'] = array();
}

//Validación
if (isset($_POST['enviar'])) {
    $nombre = clearData($_POST['nombre']);
    $notaprimertrim = clearData($_POST['notaprimertrim']);
    $notasegundotrim = clearData($_POST['notasegundotrim']);
    $notatercertrim = clearData($_POST['notatercertrim']);
    $procesaFormulario = true;

    if (empty($nombre)) {
        $msgError = "Sin rellenar";
        $procesaFormulario = false;
    } 

    if (empty($notaprimertrim)) {
        $msgError = "Sin rellenar";
        $procesaFormulario = false;
    }

    if (empty($notasegundotrim)) {
        $msgError = "Sin rellenar";
        $procesaFormulario = false;
    }

    if (empty($notatercertrim)) {
        $msgError = "Sin rellenar";
        $procesaFormulario = false;
    }
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
    echo "<h2>Notas Alumnos:</h2>";
    echo "<form action=\"index.php\" method=\"POST\">";
    echo "Nombre: <input type=\"text\" name=\"nombre\" value=" . $nombre . ">" . $msgError . "</br>";
    echo "Nota Primer Trimestre: <input type=\"text\" name=\"notaprimertrim\" value=" . $notaprimertrim . ">" . $msgError . "</br>";
    echo "Nota Segundo Trimestre: <input type=\"text\" name=\"notasegundotrim\" value=" . $notasegundotrim . ">" . $msgError . "</br>";
    echo "Nota Tercer Trimestre: <input type=\"text\" name=\"notatercertrim\" value=" . $notatercertrim . ">" . $msgError . "</br>";
    echo "<input type=\"submit\" name=\"enviar\" value =\"enviar\" >";
    echo "</form>";
    echo "</br>";

    if ($procesaFormulario) {
        $_SESSION['nombre'][] = array("nombre" => $nombre, "notaprimertrim" => $notaprimertrim, "notasegundotrim" => $notasegundotrim, "notatercertrim" => $notatercertrim);
        echo "<table border = '1'>";
        echo "<tr>";
        echo "<td><b>Nombre</b></td><td><b>Notas Primer Trimestre</b></td><td><b>Notas Segundo Trimestre</b></td><td><b>Notas Tercer Trimestre</b></td><td><b>Nota Media Alumno</b></td>";
        foreach ($_SESSION['nombre'] as $key => $value) {
            echo "<tr>";
            echo "<td>";
            echo $value['nombre'];
            echo "</td>";
            echo "<td>";
            echo $value['notaprimertrim'];
            echo "</td>";
            echo "<td>";
            echo $value['notasegundotrim'];
            echo "</td>";
            echo "<td>";
            echo $value['notatercertrim'];
            echo "</td>";
            echo "<td>";
            echo (($value['notaprimertrim'] + $value['notasegundotrim'] + $value['notatercertrim']) / 3);
            echo "</td>";
            echo "</tr>";
        }

        echo "</tr>";
        echo "</table>";
    }
    echo "</br>";
    echo "<a href=\"cierresesion.php\">Cerrar Sesión</a>";
    ?>
</body>

</html>