<?php
/**
 * Mandar a través de un formulario consultas
 * Autor: Antonio Quesada Cuadrado
 */

include("config/config.php");
include("include/funciones.php");

function clearData($cadena)
{
    $cadenaLimpia = htmlspecialchars($cadena);
    $cadenaLimpia = trim($cadenaLimpia);  // para quitar espacios al principio y al final
    $cadenaLimpia = stripslashes($cadenaLimpia); // para quitar las barras de un string
    return $cadenaLimpia;
}

$bd = conectaDB();
$nombre = "";
$resultado = "";
$procesaFormulario = false;

//Añadir 
if (isset($_POST['añadir'])) {
    $nombre = clearData($_POST["nombre"]);
    $procesaFormulario = true;

    if (empty($nombre)) {
        $procesaFormulario = false;
    }
}
if ($procesaFormulario) {
    $sql = "insert into superheroes(nombre) values('" . $nombre . "')";
    if ($bd->query($sql)) {
        echo $_POST["nombre"];
    } else {
        echo "Error no se ha insertado";
    }

} else {
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    echo "<input type=\"text\" name=\"nombre\">";
    echo "<input type=\"submit\" name=\"añadir\" value =\"añadir\" >";
    echo "</form>";

    $consulta = $bd->prepare("SELECT * FROM superheroes");
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    foreach ($resultado as $valor) {
        echo "<li>" . $valor["nombre"] . "</li>" . "<br/>";
    }
}


//Eliminar
if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $sql2 = "DELETE FROM superheroes WHERE id = ?";
    $consulta = $bd->prepare($sql2);
    $consulta->execute(array($id));
    if (!$consulta) {
        echo "Error en la consulta.";
    } else {
        echo "Eliminado Correctamente.";
    }
} else {
    foreach($resultado as $valor){
        echo "<tr>";
        echo "<td>".$valor["nombre"]."</td><td>".$valor["velocidad"]."<td><button><a href='index.php?editar=".$valor["id"]."&nombre=".$valor["nombre"]."&velocidad=".$valor["velocidad"]."'>Editar</a></button><button><a href='index.php?eliminar=".$valor["id"]."'>Eliminar</a></button><br/>";
        echo "</tr>";
    }
}

// //Editar
// if (isset($_GET["editar"])) {
//     echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
//     echo "<input type=\"text\" name=\"editar\">";
//     echo "<input type=\"submit\" name=\"editar\" value =\"editar\" >";
//     echo "</form>";
// } else {
//     $nombre = $_GET["editar"];
//     $id = $_GET["editar"];
//     $sql3 = "update superheroes set nombre = ? where id = ?";
//     $consulta = $bd->prepare($sql3);
//     $consulta->execute(array($nombre, $id));
//     if (!$consulta) {
//         echo "Error en la consulta.";
//     } else {
//         echo "Superheroe editado";
//     }
// }



