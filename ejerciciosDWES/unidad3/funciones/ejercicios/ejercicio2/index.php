<?php

/**
 * Escribe un script que permita factorizar un número pasado por la URL.  Muestra el resultado en dos columnas.
 */

/* num = 12
si num % divisor == 0
   num = num/divisor
divisor++ */

function factorizar($numero)
{
    $divisor = 2;
    while ($numero != 1) {
        if ($numero % $divisor == 0) {   
            echo ($numero." ".$divisor."<br>");
            $numero /= $divisor;
            if ($numero == $divisor){
                $divisor = 1; 
            }
        }

        $divisor++;
        
    }
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["numero"])) {
        echo "<p>La factorizacion es </p>";
        echo factorizar($_GET["numero"]);
    }
    ?>
</body>

</html>