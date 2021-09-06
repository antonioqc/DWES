<?php
include("config/config.php");
include("include/funciones.php");

$bd = conectaDB();

/*Caracter ?*/
$campo = 'b%';
$velocidad = 0;


/*Parámetro :*/
$sql = "SELECT * FROM superheroes WHERE nombre LIKE :nombre AND velocidad = :velocidad";
$consulta = $bd->prepare($sql);
$aParametros = array(
    ":nombre" => $campo,
    ":velocidad" => $velocidad
);
$consulta->execute($aParametros);
$resultado = $consulta->fetchAll();
$numeroRegistros = $consulta->rowCount();
echo "Listado de Superhéroes:$numeroRegistros<br/>";
if (!$resultado) {
    echo "Consulta vacía";
} else {
    foreach ($resultado as $valor) {
        echo $valor['nombre'] . "<br/>";
    }
}
