<?php

/**
 * 1. Crear una aplicación para gestionar una agenda de contactos. 
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
$telefono = "";
$msgError = "";
$procesaFormulario = false;

//Comprobamos si no exiten las variables de session
if (!isset($_SESSION['telefono'])) {
    $_SESSION['telefono'] = array();
}

//Validación
if (isset($_POST['enviar'])) {
    $nombre = clearData($_POST['nombre']);
    $telefono = clearData($_POST['telefono']);
    $procesaFormulario = true;

    if (empty($nombre)) {
        $msgError = "Sin rellenar";
        $procesaFormulario = false;
    }

    if (empty($telefono)) {
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
    echo "<h2>Agenda de Contactos</h2>";
    echo "<form action=\"index.php\" method=\"POST\">";
    echo "nombre: <input type=\"text\" name=\"nombre\" value=" . $nombre . ">" . $msgError . "</br>";
    echo "telefono: <input type=\"text\" name=\"telefono\" value=" . $telefono . ">" . $msgError . "</br>";
    echo "<input type=\"submit\" name=\"enviar\" value =\"enviar\" >";
    echo "</form>";
    echo "</br>";

    if ($procesaFormulario) {
        $_SESSION['telefono'][] = array("nombre" => $nombre, "telefono" => $telefono);
        echo "<table border = '1'>";
        echo "<tr>";
        echo "<td><b>Nombre</b></td><td><b>Teléfono</b></td>";
        foreach ($_SESSION['telefono'] as $key => $value) {
            echo "<tr>";
            echo "<td>";
            echo $value['nombre'];
            echo "</td>";
            echo "<td>";
            echo $value['telefono'];
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