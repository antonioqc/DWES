<?php

/**
 * Validación formulario
 * 
 * 
 */

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
$url = "";
$textArea = "";
$aTransporte = array("Bike", "Car", "Patinete");
$aCoches = array("volvo", "BMW", "Audi", "Mercedes");
$aOpciones = array("opcion1", "opcion2", "opcion3", "opcion4");
$genero = array("hombre", "mujer", "otro");
$msgErrorNombre = "";
$msgErrorUrl = "";
$msgErrorEmail = "";
$msgErrorGenero = "";
$msgErrorTextArea = "";
$msgErrorACoches = "";
$msgErrorRadio = "";
$procesaFormulario = false;

//Validación
if (isset($_POST['enviar'])) {
    $nombre = clearData($_POST['nombre']);
    $email = clearData($_POST['email']);
    $textArea = clearData($_POST['descripcion']);
    $url = clearData($_POST['url']);


    $procesaFormulario = true;
    if (empty($nombre)) {  //validar nombre  
        $msgErrorNombre = "Name is required";
        $procesaFormulario = false;
    }

    if (empty($email)) {  //validar email  
        $msgErrorEmail = "Email requerido";
        $procesaFormulario = false;
    }
    if (empty($url)) {  //validar url 
        $msgErrorUrl = "url requerida";
        $procesaFormulario = false;
    }
    if (empty($_POST['genero'])) {  //validar genero
        $msgErrorGenero = "Genero requerido";
        $procesaFormulario = false;
    }

    if (empty($_POST['transporte'])) {
        $msgErrrorTransporte = "Transporte requerido";
        $procesaFormulario = false;
    }

    if (empty($_POST['opciones'])) {
        $msgErrrorTransporte = "Opción requerida";
        $procesaFormulario = false;
    }
    if (empty($_POST['opcMultiple'])) {
        $msgErrrorTransporte = "Opciones requerida";
        $procesaFormulario = false;
    }
}
echo "<b>VALIDACIÓN FORMULARIO PHP</b>";
echo "<br><br><br>";

echo "*campos obligatorios" . "<br>";

//Formulario
if ($procesaFormulario) {
    echo "Nombre: " . $nombre . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Url: " . $url . "<br>";
    echo "Descripción: " . $textArea . "<br>";
    echo "Género: " . $_POST['genero'] . "<br>";

    foreach ($_POST['transporte'] as $vehiculo) {
        echo "Transporte: " . $vehiculo . "<br>";
    }
    echo "Opción: " . $_POST['opciones'] . "<br>";

    foreach ($_POST['opcMultiple'] as $opcion) {
        echo "Opciones vehiculos: " . $opcion . "<br>";
    }
} else {
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";

    echo "<br>";

    //echo "<input type=\"text\" name=\"nombre\" placeholder=\"nombre\" value = \"". $nombre. "\">" . "*" . " " . $msgErrorNombre;
    echo '<input type="text" name="nombre" placeholder="nombre" value = "' . $nombre . '">' . '*' . ' '  . $msgErrorNombre;
    echo "<br><br><br>";
    echo "<input type='email' name='email' placeholder='email'value = " . $email . ">" . "*" . " " . $msgErrorEmail;
    echo "<br><br><br>";
    echo "<input type='text' name='url' placeholder='url' value = " . $url . ">";
    echo "<br><br><br>";
    echo "Comentarios:";
    echo "<br><br><br>";
    echo "<textarea name='descripcion' placeholder='descripcion'>" . $textArea . "</textarea>" . $msgErrorTextArea;
    echo "<br><br><br>";
    echo 'Genero :';

    foreach ($genero as $sexo) {
        if (!empty($_POST['genero'])) {
            echo '<label for= ' . "$sexo" . '><input type="radio" id= ' . "$sexo" . ' name="genero" value = ' . "$sexo" . '
           ' . ($sexo == $_POST['genero'] ? "checked" : "") . '>' . "$sexo" . '</label>';
        } else {
            echo '<label for= ' . "$sexo" . '><input type="radio" id= ' . "$sexo" . ' name="genero" value = ' . "$sexo" . '>' . "$sexo" . '</label>';
        }
    }
    echo " * " . $msgErrorGenero;

    echo "<br><br><br>";
    echo "Transporte: ";
    echo "<br><br>";

    foreach ($aTransporte as $opciones) {
        if (!empty($_POST['transporte'])) {
            echo '<label for = ' . "$opciones" . '><input type="checkbox" id=' . "$opciones" . ' name = "transporte[]" value=' . "$opciones" . '
            ' . (in_array($opciones, $_POST['transporte']) ? "checked" : "") . '>' . $opciones . '</label>';
        } else {
            echo '<label for = ' . "$opciones" . '><input type="checkbox" id=' . "$opciones" . ' name = "transporte[]" value=' . "$opciones" . '>' . $opciones . '</label>';
        }
    }


    echo "<br><br><br>";

    echo "Seleccione la opción adecuada ";
    echo '<select name = "opciones">';
    foreach ($aOpciones as $opc) {
        if (!empty($_POST['opciones'])) {
            echo '<option value=' . "$opc" . ' ' . ($opc == $_POST['opciones'] ? "selected" : "") . '>' . $opc . '</option>';
        } else {
            echo '<option value=' . "$opc" . '>' . $opc . '</option>';
        }
    }
    echo '</select>';

    echo "<br><br><br><br><br><br>";
    echo "Seleccione el vehiculo (multiple opción)";

    echo "<br><br>";
    echo "<select name='opcMultiple[]' id='cars' multiple>";
    foreach ($aCoches as $opciones) {
        if (!empty($_POST['opcMultiple'])) {
            echo '<option value=' . "$opciones" . ' ' . (in_array($opciones, $_POST['opcMultiple']) ? "selected" : "") . '>' . $opciones . '</option>';
        } else {
            echo '<option value=' . "$opciones" . '>' . $opciones . '</option>';
        }
    }
    echo '</select>';
    echo "<br>";
    echo "<input type='submit' name='enviar' value='Enviar'>";
    echo "</form>";
}