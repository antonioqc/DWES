<?php
session_start();

if($_SESSION["perfil"] != "admin") {
    header("Location: http://iesgrancapitan.org");
}

echo session_id();
$_SESSION["mensaje"]="Hola mundo, script 2";
echo "<p>Pagina 2</p>";
echo $_SESSION["mensaje"]."<br/>";
echo "<a href=\"sesiones_ej1.php\">Página 1</a>";
?>