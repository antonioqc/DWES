<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 4</title>
</head>

<body>
    <?php
    /*         $comida = array(
            "primeros" => array(
                array("comida"=>"sopa de cebolla","precio"=>"5"),
                array("comida"=>"revuelto de setas","precio"=>"6"),
                array("comida"=>"pasta carbonara","precio"=>"8"),),
            "segundos" => array(
                "comida"=>"lubina","precio"=>"10",
                "comida"=>"rabo de toro","precio"=>"15",
                "comida"=>"flamenquín","precio"=>"8",
                "comida"=>"pez espada","precio"=>"7.50",
                "comida"=>"presa ibérica","precio"=>"12"),
            "postres" => array(
                "comida"=>"tarta tres chocolates", "precio"=>"6",
                "comida"=>"helado", "precio"=>"2",
                "comida"=>"flan", "precio"=>"4"),     
        );   */

    $comida = array(
        array("primeros" => array("sopa de cebolla" => 555, "revuelto de setas" => 220, "pasta carbonara" => 300),),
        array("segundos" => array("lubina" => 569, "rabo de toro" => 15, "flamenquín" => 8, "pez espada" => 7.50, "presa ibérica" => 12),),
        array("postres" => array("tarta tres chocolates" => 6, "helado" => 2, "flan" => 4),),
    );

    /*         foreach($comida as $valorcomida) {
            foreach($valorcomida["primeros"] as $valorprimeros=>$precioprimeros){
                echo "<p>$valorprimeros</p>";
                echo "<p>$precioprimeros</p>";
            }

            foreach($valorcomida["segundos"] as $valorsegundos=>$preciosegundos){
                echo "<p>$valorsegundos</p>";
                echo "<p>$preciosegundos</p>";
            }

            foreach($valorcomida["postres"] as $valorpostres=>$preciopostres){
                echo "<p>$valorpostres</p>";
                echo "<p>$preciopostres</p>";
            } 
        } */

    /* foreach ($comida as $valorprimeros) {
            foreach($segundos as $valorsegundos) {
                foreach($postres as $valorpostres) {
                    
                }
            }
        } */


    foreach ($comida as $valorComida) {
        foreach ($valorComida["primeros"] as $valorPrimeros => $precioprimeros) {
            echo "<p>La " . $valorPrimeros . " tienen un precio de " . $precioprimeros . "</p>";
        }

        foreach ($valorComida["segundos"] as $valorSegundos => $preciosegundos) {
            echo "<p>La " . $valorSegundos . " tienen un precio de " . $preciosegundos . "</p>";
        }

        foreach ($valorComida["postres"] as $valorPostres => $preciopostres) {
            echo "<p>La " . $valorPostres . " tienen un precio de " . $preciopostres . "</p>";
        }
        
    }
    ?>
</body>

</html>