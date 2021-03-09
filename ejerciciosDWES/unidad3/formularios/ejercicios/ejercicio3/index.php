<?php

/**
 * Crear una aplicación que almacene información de países: nombre capital y bandera.
 * Diseñar un formulario que permita seleccionar un país y nos muestre el nombre de la capital y la bandera.
 */
//Banderas.
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

//Inicialización de variables
$capital = "";
$msgError = "";
$procesaFormulario = false;

//Validacion
if (isset($_POST['enviar'])) {
    $procesaFormulario = true;

    if (empty($_POST['paises'])) {
        $msgError = "Seleccione una opción.";
        $procesaFormulario = false;
    }
}

//Formulario
$apaises = array(
    array(
        "banderas" => array("España" => $banderaEspaña, "Francia" => $banderaFrancia, "Italia" => $banderaItalia),
        "paises" => array("España" => "Madrid", "Francia" => "París", "Italia" => "Roma"),
    ),
    array(
        "banderas" => array("Armenia" => $banderaArmenia, "China" => $banderaChina,),
        "paises" => array("Armenia" => "Ereván", "China" => "Pekín"),
    ),
    array(
        "banderas" => array("EEUU" => $banderaEEUU, "Canadá" => $banderaCanada, "México" => $banderaMexico),
        "paises" => array("EEUU" => "Washington D.C.", "Canadá" => "Ottawa", "México" => "Ciudad de Mexico"),
    ),
    array(
        "banderas" => array("Argelia" => $banderaArgelia, "Egipto" => $banderaEgipto, "Etiopía" => $banderaEtiopía),
        "paises" => array("Argelia" => "Argel", "Egipto" => "El Cairo", "Etiopía" => "Adís Abeba"),
    ),
    array(
        "banderas" => array("Australia" => $banderaAustralia, "Nueva Zelanda" => $banderaNZelanda),
        "paises" => array("Australia" => "Canberra", "Nueva Zelanda" => "Wellington"),
    ),
);

//Formulario
if ($procesaFormulario) {
    foreach ($apaises as $paises) {
        foreach ($paises["paises"] as $valorPaises => $capital) {
            //if ($valorPaises == "España") {
                echo "Capital: " . $capital . "<br>";
            //}
        }
        
    }
        /* foreach($paises["banderas"] as $valorPaises => $valorBandera){
            echo "<p><b>Bandera: </b>: <img src= $valorBandera width= 30px height=30px></img></p>";
        } */

       
    
} else {
    echo "<form action=$_SERVER[PHP_SELF] method='POST'>";
    echo "<select name=\"paises\" id=\"paises\" multiple>";
    foreach ($apaises as $paises) {
        foreach ($paises["paises"] as $valorPaises => $capital) {
            echo "<option value=$valorPaises>$valorPaises</option>";
        }
    }
    echo "</select>";
    echo "<p style='color:red'>$msgError</p>";

    echo "<br>";
    echo "<input type='submit' name='enviar' value='Enviar'>";
    echo "</form>";
}
