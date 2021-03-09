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
$user = $_COOKIE["user"] ?? " ";
$password = $_COOKIE["password"] ?? " ";
$recordar = "";
$error = "";
$procesaFormulario = false;

//Validación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = clearData($_POST['nombre']);
    $password = clearData($_POST['email']);
    $procesaFormulario = true;
    if (empty($_POST["user"])) {
        $error = "Campo vacio";
        $procesaFormulario = false;
    }

    if (empty($_POST["password"])) {
        $error = "Campo vacio";
        $procesaFormulario = false;
    }

}

/* if (isset($_COOKIE["user"])) {
    echo $_COOKIE["user"];
} else {
    setcookie("user","Edgar Allan Poe", time()+3600);
} */


//Formulario
if ($procesaFormulario) {
    echo "Nombre: " . $user . "<br>";
    echo "Email: " . $password . "<br>";

} else {
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    echo "<br>";

    echo "<input type=\"text\" name=\"user\" placeholder=\"user\" value = " . $user . ">". "" . $error;
    echo "<br>";

    echo "<input type=\"text\" name=\"password\" placeholder=\"password\" value = " . $password . ">". "" . $error;
    echo "<br>";

    echo "<label><input type=\"checkbox\" name=\"recordar\" value='" . $recordar . "'>
         <label for=$recordar>$recordar</label>";

    echo "<br><br><br><br><br><br>";
    echo "<input type='submit' name='enviar' value='Enviar'>";
    echo "</form>";

    /*if recordar con isset

        setcookie("user","$user",time()+3600)
        setcookie("password","$password",time()+3600) 
    else {
        setcookie("user","$user",time()-3600)
        setcookie("password","$password",time()-3600) 
    }  
        
        */
}   
?>