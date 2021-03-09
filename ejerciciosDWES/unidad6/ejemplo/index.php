<?php
include("config/config.php");
include("include/funciones.php");

$bd = conectaDB();
// $nombre = "batmann";
// $sql ="insert into superheroes(nombre) values('". $nombre." ')";
// if ($bd->query($sql)) {
//     echo "ok";
// }
// else {
//     echo "error";
// }

// $sql2 = "SELECT * FROM superheroes";
// //$resultado = $bd->query($sql2);
// $consulta = $bd->prepare($sql2);
// $consulta->execute();
// $resultado = $consulta->fetchAll();
// foreach ($resultado as $valor) {
//     echo $valor['nombre'] . "<br/>";
// }

// $nombre2 = "hombrearaña";
// $id = 1;
// $sql3 = "update superheroes set nombre = '".$nombre2."' where id = ".$id;
// if ($bd->query($sql3)) {
//     echo "ok update";
// }
// else {
//     echo "error update";
// }

// $velocidad = 5;
// $sql4 = "update superheroes set velocidad = ".$velocidad;
// if ($bd->query($sql4)) {
//     echo "ok velocidad";
// }
// else {
//     echo "error velocidad";
// }


/*Caracter ?*/
$campo = 'b%';
$velocidad = 0;
// $sql = "SELECT * FROM superheroes WHERE nombre LIKE ?";
// $consulta = $bd->prepare($sql);
// $consulta->execute(array($campo));
// //$consulta->execute(array($campo, $velocidad));
// $resultado = $consulta->fetchAll();
// $numeroRegistros = $consulta->rowCount();
// echo "Listado de Superhéroes:$numeroRegistros<br/>";
// if (!$resultado) {
//     echo "Consulta vacía";
// } else {
//     foreach ($resultado as $valor) {
//         echo $valor['nombre'] . "<br/>";
//     }
// }


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
