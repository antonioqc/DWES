<?php

/**
 * 1. Desarrolla una aplicación que genere un script para creación de usuarios a partir de un fichero.
 * Descargar fichero de alumnos.
 * 
 * Opción A:  MYSQL
 * Ayuda:
 * BD:  CREATE DATABASE bdejemplo
 * Usuarios: GRANT ALL PRIVILEGES ON bdejemplo.* TO 'usuario'@'localhost' IDENTIFIED BY 'clave';
 * 
 * Opción B: ORACLE
 * Opción C: LINUX 
 * Utilizando el modelo del primer ejecicio, desarrolla una aplicación para la creación masiva de usuarios en linux.
 */

//Lectura del fichero de alumnos y escritura de los usuarios en un archivo.sh.
$aUsuarios = array();
$usuario = "";
$contador = 0;

//inicializar sufijoo y contador de nuevo
$ficherolectura = fopen("alumnos.txt", "r");
$ficherousuarios = fopen("crearusuarios.sh", "w");
while (!feof($ficherolectura)) {
    $linea = fgets($ficherolectura);
    $sufijo = "";
    do {
        $sufijo = ($contador == 0) ? "" : $contador;
        $usuario = generarUsuario(normaliza($linea));
        $contador++;
    } while (in_array($usuario, $aUsuarios, true));

    $aUsuarios[] = $usuario . $sufijo;
}

foreach ($aUsuarios as $value) {
    echo $value;
} 

fclose($ficherolectura);
fclose($ficherousuarios);

/**
 * Normaliza los usuarios.
 */
function normaliza($cadena)
{
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

/**
 * Genera usuarios. Coge las dos primeras letras del nombre, apellido1 y apellido2.
 */
function generarUsuario($cadena)
{
    $nombre = "";
    $apellido1 = "";
    $apellido2 = "";
    //Con la expresión regular saco las dos primeras letras y lo almaceno en un array.
    if (preg_match_all("/(\b[a-z]{2})/i", $cadena, $array)) {

        //Recorro el array para sacar los usuarios.
        foreach ($array as $valorUsuarios) {
            $nombre = $valorUsuarios[0];
            $apellido1 = $valorUsuarios[1];
            $apellido2 = $valorUsuarios[2];
        }
    }

    // print_r($array);
    //Usuario. PHP_EOL para salto de línea.
    return $nombre . $apellido1 . $apellido2 . PHP_EOL;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - ficheros</title>
</head>

<body>

</body>

</html>