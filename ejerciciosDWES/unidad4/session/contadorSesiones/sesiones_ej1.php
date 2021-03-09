<?php
session_start();
if (!isset($_SESSION['horaInicio'])){
    $_SESSION["horaInicio"] = time();
    $_SESSION["contador"] = 0;
}
echo "<br/>Pagina 1</br>";
$_SESSION["contador"]++;
echo $_SESSION["contador"];
echo "</br>";

echo $_SESSION["horaInicio"]."<br/>";
$horaActual = time();
echo $horaActual;
echo "<br/>";

$tiempoTranscurrido = $horaActual - $_SESSION["horaInicio"];
echo $tiempoTranscurrido;

if ($tiempoTranscurrido > 10) {
    unset($_SESSION["contador"]);
    unset ($_SESSION["horaInicio"]);
    session_destroy();
    session_start();
    session_regenerate_id(true);
} else {
    $_SESSION["horaInicio"] - time();
    $_SESSION["contador"]++;
} 
echo "<a href=\"sesiones_ej1.php\">Recarga</a>";
echo "<a href=\"cierresesion.php\">Cierra Sesion</a>";
?>