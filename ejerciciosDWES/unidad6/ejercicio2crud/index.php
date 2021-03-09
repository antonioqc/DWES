<?php

/**
 * Mandar a través de un formulario consultas
 * Autor: Antonio Quesada Cuadrado
 */

include("Superheroe.php");

function clearData($cadena)
{
    $cadenaLimpia = htmlspecialchars($cadena);
    $cadenaLimpia = trim($cadenaLimpia);  // para quitar espacios al principio y al final
    $cadenaLimpia = stripslashes($cadenaLimpia); // para quitar las barras de un string
    return $cadenaLimpia;
}

$nombre = "";
$velocidad = "";
$procesaFormulario = false;
$procesaFormularioEditar = false;

//Añadir 
if (isset($_POST['añadir'])) {
    $nombre = clearData($_POST["nombre"]);
    $velocidad = clearData($_POST["velocidad"]);
    $procesaFormulario = true;

    if (empty($nombre)) {
        $procesaFormulario = false;
    }

    if (empty($velocidad)) {
        $procesaFormulario = false;
    }
}

if ($procesaFormulario) {
    //INSERCIÓN DATOS
    $sh = Superheroe::getInstancia();
    $datos = array("nombre" => $nombre, "velocidad" => $velocidad);
    $sh->set($datos);
    echo "----" . $sh->getMensaje() . "</br>";
} else {
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    echo "<input type=\"text\" name=\"nombre\" placeholder=\"nombre\">";
    echo "<input type=\"text\" name=\"velocidad\" placeholder=\"velocidad\">";
    echo "<input type=\"submit\" name=\"añadir\" value =\"añadir\" >";
    echo "</form>";

    //LISTADO DATOS
    $sh = Superheroe::getInstancia();
    $listado = $sh->getAll();
    echo "<h2>Listado Superhéroes:</h2>";
    echo "<table border=1>";
    echo "<td>Nombre</td><td>Velocidad</td>";
    foreach ($listado as $valor) {
        echo "<tr>";
        echo "<td>" . $valor["nombre"] . "</td><td>" . $valor["velocidad"] . "<td>
        <button><a href='index.php?editar=" . $valor["id"] . "&nombre=" . $valor["nombre"] . "&velocidad=" . $valor["velocidad"] . "'>Editar</a></button>
        <button><a href='index.php?eliminar=" . $valor["id"] . "'>Eliminar</a></button><br/>";
        echo "</tr>";
    }
    echo "</table>";
}

//ELIMINACIÓN DATOS
if (isset($_GET['eliminar'])) {
    $lista = $sh->getAll();
    $sh = Superheroe::getInstancia();
    $sh->delete($_GET["eliminar"]);
}


//EDITAR DATOS
if (isset($_GET["editar"])) {
    $nombre = $_GET["nombre"];
    $velocidad = $_GET["velocidad"];
    $id = $_GET["editar"];
    echo "<form action=\"index.php\" method='post'>";
    echo "<input type=\"text\" name=\"nombre\" value =\"$nombre\" placeholder=\"nombre\">";
    echo "<input type=\"text\" name=\"velocidad\" value =\"$velocidad\" placeholder=\"velocidad\">";
    echo "<input type=\"hidden\" name=\"id\" value =\"$id\" placeholder=\"id\">";
    echo "<input type=\"submit\" name=\"actualizar\" value =\"editar\" >";
    echo "</form>";
} else {
    echo "<form action=\"index.php\" method='POST'>";
    echo "<input type=\"text\" name=\"nombre\" placeholder=\"nombre\">";
    echo "<input type=\"text\" name=\"velocidad\" placeholder=\"velocidad\">";
    echo "<input type=\"submit\" name=\"añadir\" value =\"añadir\" >";
    echo "</form>";
}


if (isset($_POST["actualizar"])) {
    $datos = array("nombre" => clearData($_POST["nombre"]), "velocidad" => clearData($_POST["velocidad"]), "id" => $_POST["id"]);
    $sh = Superheroe::getInstancia();
    $sh->edit($datos);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
            };
            xmlhttp.open("GET", "ajax.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
</head>
<body>
    <p><b>Start typing a name in the input field below:</b></p>
    <form action="">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
    </form>
    <p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>
