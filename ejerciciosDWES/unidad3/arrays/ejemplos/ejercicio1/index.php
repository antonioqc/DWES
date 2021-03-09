<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio casos covid</title>
</head>
<body>
    <?php
 /*        $comunidades = array (
            "Andalucia"=>array("Córdoba","Granada"),
            "CastillaLeon"=>array("Valladolid","Leon"),
            "Madrid"=>array("Madrid"),
            "Galicia"=>array("Lugo","orense","coruña","pontevedra"),
        ); */

        //Array indexado. Contiene dentro arrays asociativo y dentro del asociativo otro indexado.
        $comunidades = array(
            array("comunidad"=>"Andalucia", "provincias"=>array("Almería"=>555, "Cádiz"=>220, "Córdoba"=>300, "Granada"=>400, "Huelva"=>500, "Jaén"=>600, "Málaga"=>700, "Sevilla"=>800),),  
            array("comunidad"=>"Asturias", "provincias"=>array("Oviedo"=>569),),
            array("comunidad"=>"Aragón", "provincias"=>array("Huesca"=>230, "Teruel"=>123, "Zaragoza"=>96),),  
            array("comunidad"=>"Baleares", "provincias"=>array("Palma de Mallorca"=>342),),  
            array("comunidad"=>"Canarias", "provincias"=>array("Santa Cruz de Tenerife"=>32,"Las Palmas de Gran Canaria"=>47),),
            array("comunidad"=>"Cantabria", "provincias"=>array("Santander"=>750),),    
            array("comunidad"=>"Castilla-La Mancha", "provincias"=>array("Albacete"=>238,"Ciudad Real"=>550,"Cuenca"=>600,"Guadalajara"=>450,"Toledo"=>523),),
            array("comunidad"=>"Castilla y León", "provincias"=>array("Ávila"=>950, "Burgos"=>250, "León"=>130, "Salamanca"=>710, "Segovia"=>720, "Soria"=>210, "Valladolid"=>500, "Zamora"=>501),),
            array("comunidad"=>"Cataluña", "provincias"=>array("Barcelona"=>111, "Gerona"=>888, "Lérida"=>270, "Tarragona"=>104),),
            array("comunidad"=>"Comunidad Valenciana", "provincias"=>array("Alicante"=>623, "Castellón de la Plana"=>912, "Valencia"=>106),),  
            array("comunidad"=>"Extremadura", "provincias"=>array("Badajoz"=>532, "Cáceres"=>283),),     
            array("comunidad"=>"Galicia", "provincias"=>array("La Coruña"=>432, "Lugo"=>101, "Orense"=>299, "Pontevedra"=>99),), 
            array("comunidad"=>"Madrid", "provincias"=>array("Madrid"=>1000),),    
            array("comunidad"=>"Murcia", "provincias"=>array("Murcia"=>566),),          
            array("comunidad"=>"Navarra", "provincias"=>array("Pamplona"=>122),),     
            array("comunidad"=>"País Vasco", "provincias"=>array("Bilbao"=>450,"San Sebastián"=>210, "Vitoria"=>799),),  
            array("comunidad"=>"La Rioja", "provincias"=>array("Logroño"=>375),),   
        );
        
       foreach($comunidades as $valorComunidad) {
        $totales = 0;
           echo "<h3>Comunidad:".$valorComunidad["comunidad"]."</h3>";
            foreach ($valorComunidad["provincias"] as $valorProvincia=>$covid){
                if ($covid > 500) {
                    echo "<p style='color:red'>$valorProvincia cuenta con $covid casos</p>";
                } else {
                    echo "<p style='color:green'>$valorProvincia cuenta con $covid casos</p>";
                }   
                
                $totales += $covid;
            } 
            
            echo "<p>Total: $totales </p>";
        } 
    ?>
</body>
</html>