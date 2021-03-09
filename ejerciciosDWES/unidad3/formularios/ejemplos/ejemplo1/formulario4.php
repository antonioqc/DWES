<?php
/**
 * Ejemplo de formulario donde se pide y muestra nombre, apellidos y email.
 * Se validan y muestra error si es incorrecto.
 * 
 * Autor: Antonio Quesada Cuadrado
 */

// Limpieza de datos
function clearData($cadena)
{
    $cadenaLimpia = htmlspecialchars($cadena);
    $cadenaLimpia = trim($cadenaLimpia);  // para quitar espacios al principio y al final
    $cadenaLimpia = stripslashes($cadenaLimpia); // para quitar las barras de un string

    return $cadenaLimpia;
}


//Inicialización de variables
$nombre = "";
$email = "";
$apellidos = "";
$msgErrorNombre = "";
$msgErrorApellidos = "";
$msgErrorEmail = "";
$msgErrorGenero = "";
$procesaFormulario = false;
$genero = array("hombre","mujer","otro");
$transporte = array("bici","coche","patinete");
$vehiculos = array("renault","mercedes","citroen","volvo");

//Validación
if (isset($_POST['enviar'])) {
    $nombre = clearData($_POST['nombre']);
    $apellidos = clearData($_POST['apellidos']);
    $email = clearData($_POST['email']);
    $procesaFormulario = true;
    if (empty($nombre)) {  //validar nombre  
        $msgErrorNombre = "Nombre requerido";
        $procesaFormulario = false;
    }
    if (empty($apellidos)) {  //validar apellido  
        $msgErrorApellidos = "Apellidos requerido";
        $procesaFormulario = false;
    }
    if (empty($email)) {  //validar email  
        $msgErrorEmail = "Email requerido";
        $procesaFormulario = false;
    }
}

//Formulario
if ($procesaFormulario) {
    echo "Nombre: " . $_POST['nombre'] . " ";
    echo "Apellidos: " . $_POST['apellidos'] . " ";
    echo "Email: " . $_POST['email'] . " ";
} else {
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    echo "<input type='text' name='nombre'>".$msgErrorNombre;
    echo "<br>";
    echo "<input type='text' name='apellidos'>".$msgErrorApellidos;
    echo "<br>";
    echo "<input type='email' name='email'>".$msgErrorEmail;
    echo "<br>";
    echo "<input type='submit' name='enviar'>";
    echo "</form>"; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Antonio Quesada Cuadrado">
    <title>formulario3</title>
</head>
<body>
</body>
</html>














echo "<input type='radio' name='h' value='h'>Hombre";
    echo "<input type='radio' name='m' value='m'>Mujer";
    echo "<input type='radio' name='o' value='o'>Otro";
    echo "<br>";