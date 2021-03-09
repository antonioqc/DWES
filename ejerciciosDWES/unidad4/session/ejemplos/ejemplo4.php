<?php
/**
 * Ejemplo de clase
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
$fecha = "";
$tarea = "";
$msgError = "";
$procesaFormulario = false;

//Comprobamos si no exiten las variables de session
if (!isset($_SESSION['tarea'])) {
    $_SESSION['tarea'] = array();
}

//Validación
if (isset($_POST['enviar'])) {
    $fecha = clearData($_POST['fecha']);
    $tarea = clearData($_POST['tarea']);
    $procesaFormulario = true;

    if (empty($fecha)) { 
        $msgError = "Sin rellenar";
        $procesaFormulario = false;
    }

    if (empty($tarea)) {  
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

    echo "<form action=\"ejemplo4.php\" method=\"POST\">";
    echo "fecha: <input type=\"text\" name=\"fecha\" value=" . $fecha . ">".$msgError."</br>";
    echo "tarea: <input type=\"text\" name=\"tarea\" value=" . $tarea . ">".$msgError."</br>";
    echo "<input type=\"submit\" name=\"enviar\" value =\"enviar\" >";
    echo "</form>";

    if ($procesaFormulario) {
        $_SESSION['tarea'][] = array("fecha" => $fecha, "tarea" => $tarea);

        foreach ($_SESSION['tarea'] as $key => $value) {
            echo $value['fecha'] . "---" . $value['tarea'] . "</br>";
        }
    }
    ?>
</body>

</html>