<?php
    /**
     * Cargar fecha de nacimiento en una variable y calcular la edad.
     * Autor: Antonio Quesada Cuadrado
     */

    $fechanacimiento = date("2000-11-16");
    $fechaactual = date("Y-m-d");
    $resultado = $fechaactual-$fechanacimiento;
    //$format = '%a';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
        echo $resultado;
    ?>
</body>
</html>