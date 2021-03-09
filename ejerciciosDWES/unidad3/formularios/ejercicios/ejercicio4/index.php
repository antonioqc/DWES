<?php

/**
 * Crear un script para sumar una serie de números. El número de números a sumar será introducido en un formulario.
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
$numero = "";
$suma = 0;
$msgError = "";
$procesaFormulario = false;

//Validacion
if (isset($_POST['calcular'])) {
    $numero = clearData($_POST['numero']);
    $procesaFormulario = true;

    if (empty($numero)) {
        $msgError = "Debe introducir el número a sumar";
        $procesaFormulario = false;
    }
}

$arraynumeros = array(1, 2, 3, 4, 5, 6);
//Formulario
if ($procesaFormulario) {
    for ($i = 0; $i <= $numero; $i++) {
        foreach ($arraynumeros as $num) {
            $suma += $num;
        }
    }

    echo "<p>El valor de la suma es ".$suma."</p>";

} else {
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    echo "<p>Introduce el número de números a sumar.</p>";
    echo "<input type=\"text\" name=\"numero\" placeholder=\"numero\" value = " . $numero . ">";
    echo "<p style='color:red'>$msgError</p>";
    echo "<br>";
    echo "<input type='submit' name='calcular' value='Calcular'>";
    echo "</form>";
}
