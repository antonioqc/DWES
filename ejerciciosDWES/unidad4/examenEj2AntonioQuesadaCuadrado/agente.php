<?php
function clearData($cadena)
{
    $cadenaLimpia = htmlspecialchars($cadena);
    $cadenaLimpia = trim($cadenaLimpia);  // para quitar espacios al principio y al final
    $cadenaLimpia = stripslashes($cadenaLimpia); // para quitar las barras de un string
    return $cadenaLimpia;
}

//Inicialización variables
$matricula = "";
$descripcion = "";
$fecha = "";
$importe = "";
$procesaFormulario = false;

//Comprobamos si no exiten las variables de session
if (!isset($_SESSION['matricula'])) {
    $_SESSION['matricula'] = array();
}

//Validación
if (isset($_POST['enviar'])) {
    $matricula = clearData($_POST['matricula']);
    $descripcion = clearData($_POST['descripcion']);
    $fecha = clearData($_POST['fecha']);
    $importe = clearData($_POST['importe']);
    $procesaFormulario = true;

    if (empty($matricula)) {
        $procesaFormulario = false;
    }

    if (empty($descripcion)) {
        $procesaFormulario = false;
    }

    if (empty($fecha)) {
        $procesaFormulario = false;
    }

    if (empty($importe)) {
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
    echo "<a href=\"index.php\">Inicio</a>";

    echo "<h2>Añadir Multas</h2>";
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    echo "matricula: <input type=\"text\" name=\"matricula\" value=" . $matricula . "></br>";
    echo "descripcion: <input type=\"text\" name=\"descripcion\" value=" . $descripcion . "></br>";
    echo "fecha: <input type=\"text\" name=\"fecha\" value=" . $fecha . "></br>";
    echo "importe: <input type=\"text\" name=\"importe\" value=" . $importe . "></br>";
    echo "<input type=\"submit\" name=\"enviar\" value =\"enviar\" ></br>";
    echo "</form>";
    echo "</br>";

    if ($procesaFormulario) {
        $_SESSION['matricula'][] = array("matricula" => $matricula, "descripcion" => $descripcion, "fecha" => $fecha, "importe" => $importe);
        echo "<table border = '1'>";
        echo "<tr>";
        echo "<td><b>Matrícula</b></td><td><b>Descripción</b></td><td><b>Fecha</b></td><td><b>Importe</b></td>";
        foreach ($_SESSION['matricula'] as $key => $value) {
            echo "<tr>";
            echo "<td>";
            echo $value['matricula'];
            echo "</td>";
            echo "<td>";
            echo $value['descripcion'];
            echo "</td>";
            echo "<td>";
            echo $value['fecha'];
            echo "</td>";
            echo "<td>";
            echo $value['importe'];
            echo "</td>";
            echo "</tr>";
        }
        echo "</tr>";
        echo "</table>";
    }
    echo "</br>";
    echo "<a href=\"cierrasesion.php\">Salir</a>";
    ?>
</body>

</html>