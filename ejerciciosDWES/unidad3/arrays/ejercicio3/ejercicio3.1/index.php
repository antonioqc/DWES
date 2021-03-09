<?php
/**
 * Define un array que permita almacenar y mostrar la siguiente información.
 * Meses del año.
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 3.1</title>
</head>
<body>
    <?php
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        echo "<h2>Meses del año:</h2>";
        foreach($meses as $valormeses) {
            echo "<p>$valormeses</p>";
        }
    ?>
</body>
</html>