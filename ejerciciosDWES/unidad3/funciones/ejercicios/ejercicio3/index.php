<?php

/**
 * 3. Supongamos el siguiente array
 * Crea un script que utilice una función anónima para generar los nombres de usuarios.
 * El nombre de usuario se forma concatenadndo las dos primeras letras del primer apellido,
 * las dos primeras letras del segundo apellido y la inicial del nombre.
 */

$aUsuarios = array(

    array('nombre' => 'Jesús', 'apellido1' => 'Martínez', 'apellido2' => 'García'),

    array('nombre' => 'Mercedes', 'apellido1' => 'Calamaro', 'apellido2' => 'Pedrajas'),

    array('nombre' => 'Elena', 'apellido1' => 'Perez', 'apellido2' => 'Galán'),

);

function normaliza($cadena){
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}


$usuario = function($aUsuarios)
{    
    foreach ($aUsuarios as $valorUsuarios){
        $nombre = $valorUsuarios["nombre"];
        $apellido1 = $valorUsuarios["apellido1"];
        $apellido2 = $valorUsuarios["apellido2"]; 

        echo "<p>Usuario: ".normaliza(substr($apellido1,0,2)).normaliza(substr($apellido2,0,2)).normaliza(substr($nombre,0,2))."</p>";    

    }   

};

$usuario($aUsuarios);


