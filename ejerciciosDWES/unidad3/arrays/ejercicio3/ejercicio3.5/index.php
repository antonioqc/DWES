<?php
/**
 * Define un array que permita almacenar y mostrar la siguiente información.
 * Información sobre continentes, países, capitales y banderas.
 */
//Europa
$banderaEspaña = "img/españa.jpg";
$banderaFrancia = "img/francia.png";
$banderaItalia = "img/italia.png";

//Asia
$banderaArmenia = "img/armenia.png";
$banderaChina = "img/china.png";

//America
$banderaEEUU = "img/eeuu.png";
$banderaCanada = "img/canada.png";
$banderaMexico = "img/mexico.png";

//África
$banderaArgelia = "img/argelia.png";
$banderaEgipto =  "img/egipto.png";
$banderaEtiopía = "img/etiopia.png";

//Oceanía
$banderaAustralia = "img/australia.png";
$banderaNZelanda = "img/nuevazelanda.png";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 3.5</title>
</head>
<body>
    <?php
        $continentes = array(
            array("continente"=>"Europa",
            "banderas"=>array("España"=>$banderaEspaña,"Francia"=>$banderaFrancia,"Italia"=>$banderaItalia),
            "paises"=>array("España"=>"Madrid","Francia"=>"París","Italia"=>"Roma"),),
            array("continente"=>"Asia",
            "banderas"=>array("Armenia"=>$banderaArmenia,"China"=>$banderaChina,),
            "paises"=>array("Armenia"=>"Ereván","China"=>"Pekín"),),
            array("continente"=>"América",
            "banderas"=>array("EEUU"=>$banderaEEUU,"Canadá"=>$banderaCanada,"México"=>$banderaMexico),
            "paises"=>array("EEUU"=>"Washington D.C.","Canadá"=>"Ottawa","México"=>"Ciudad de Mexico"),),
            array("continente"=>"África",
            "banderas"=>array("Argelia"=>$banderaArgelia,"Egipto"=>$banderaEgipto,"Etiopía"=>$banderaEtiopía),
            "paises"=>array("Argelia"=>"Argel","Egipto"=>"El Cairo","Etiopía"=>"Adís Abeba"),),
            array("continente"=>"Oceanía",
            "banderas"=>array("Australia"=>$banderaAustralia,"Nueva Zelanda"=>$banderaNZelanda),
            "paises"=>array("Australia"=>"Canberra","Nueva Zelanda"=>"Wellington"),),
        );
        
        foreach($continentes as $valorContinente) {
           echo "<h2>".$valorContinente["continente"]."</h2>";
            foreach($continentes["paises"] as $valorPaises=>$capital){
                echo "<p>La capital de $valorPaises es $capital</p>";   
            }

            foreach ($valorContinente["banderas"] as $valorBandera=>$bandera){
                echo "<p><b>$valorBandera</b>: <img src= $bandera width= 30px height=30px></img></p>";
            } 
              
            echo "<br/>";
        } 
    ?>
</body>
</html>