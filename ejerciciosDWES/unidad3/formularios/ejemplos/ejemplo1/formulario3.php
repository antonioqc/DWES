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


///Inicialización de variables
$nombre = "";
$email = "";
$url = "";
$texto = "";
$genero = "";
$transporte = "";
$coches = "";
$aGenero = array("hombre", "mujer", "otro");
$aTransporte = array("Bike", "Car", "Patinete");
$aCoches = array("volvo", "BMW", "Audi", "Mercedes");
$msgErrorNombre = "";
$msgErrorUrl = "";
$msgErrorEmail = "";
$msgErrorTexto = "";
$msgErrorACoches = "";
$msgErrorGenero = "";
$msgErrorTransporte = "";
$msgErrorMarcasCoches = "";
$procesaFormulario = false;

//Validación
if (isset($_POST['enviar'])) {
    $nombre = clearData($_POST['nombre']);
    $email = clearData($_POST['email']);
    $texto = clearData($_POST['descripcion']);
    $url = clearData($_POST['url']);
    //$genero = clearData($_POST['genero']);
    //$aTransporte = ($_POST['transporte']);
    //$genero = clearData($_POST['genero']);


    $procesaFormulario = true;
    if (empty($nombre)) {
        $msgErrorNombre = "Nombre requerido";
        $procesaFormulario = false;
        $nombre = "";
    }

    if (empty($email)) {
        $msgErrorEmail = "Email requerido";
        $procesaFormulario = false;
    }

    if (empty($texto)) {
        $msgErrorTexto = "Comentario requerido";
        $procesaFormulario = false;
    }

    if (empty($url)) {

        $msgErrorUrl = "url requerida";
        $procesaFormulario = false;
    }
    if (empty($_POST['genero'])) {

        $msgErrorGenero = "Genero requerido";
        $procesaFormulario = false;
        $genero = "";
    }
    if (empty($_POST['transporte'])) {
        $msgErrorTransporte = "Transporte requerido";
        $procesaFormulario = false;
    }
    if (empty($_POST['coches'])) {
        $msgErrorMarcasCoches = "Marca de coche requerida";
        $procesaFormulario = false;
    }
}
echo "<b>VALIDACIÓN FORMULARIO PHP</b>";
echo "<br>";

//Formulario
if ($procesaFormulario) {
    echo "Nombre: " . $nombre . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Url: " . $url . "<br>";
    echo "Descripción: " . $texto . "<br>";
    echo "Género: " . $_POST['genero'] . "<br>";
    echo "Marcas Coches: " .$_POST['coches']. "<br>";
    echo "Transporte: " .$_POST['transporte'] . "<br>"; 

} else {
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    echo "<br>";

    echo "<input type=\"text\" name=\"nombre\" placeholder=\"nombre\" value = " . $nombre . ">". " " . $msgErrorNombre;
    echo "<br><br><br>";

    echo "<input type=\"text\" name=\"email\" placeholder=\"email\" value = " . $email . ">" . " " . $msgErrorEmail;
    echo "<br><br><br>";

    echo "<input type=\"text\" name=\"url\" placeholder=\"url\" value = " . $url . ">" . $msgErrorUrl;
    echo "<br><br><br>";
    echo "Comentarios:";
    echo "<br><br><br>";
    echo "<textarea name=\"descripcion\" placeholder=\"descripcion\" value = " . $texto . "></textarea>" . $msgErrorTexto;
    echo "<br><br><br>";
    echo "Genero:";

    foreach ($aGenero as $genero) {
        echo "<input type=\"radio\" name=\"genero\" value=$genero>";
        echo "<label for=$genero>$genero</label>";
    }

    echo " ".$msgErrorGenero;

    echo "<br><br><br>";
    echo "Transporte: ";
    echo "<br>";
    echo "<br>";

    foreach ($aTransporte as $transporte) {
        echo "<label><input type=\"checkbox\" name=\"transporte\" value='" . $transporte . "'>
         <label for=$transporte>$transporte</label>";
    }

    echo " ".$msgErrorTransporte;

    echo "<br><br><br>";
    echo "Selección de Coches: ";
    echo("<select name=\"coches\" id=\"coches\" multiple>");
    foreach ($aCoches as $coches) {
        echo "<option value=$coches>$coches</option>";
    }
    echo"</select>";
    echo " ".$msgErrorMarcasCoches;

    echo "<br><br><br><br><br><br>";
    echo "<input type='submit' name='enviar' value='Enviar'>";
    echo "</form>";
}
?>