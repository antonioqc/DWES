<?php
if($_SESSION["perfil"] == "gerente"){
    header("Location: index.php?page=gerente");
}elseif ($_SESSION["perfil"] == "amigo") {
    header("Location: index.php?page=amigo");
}
echo "<p>Usuario ".$_SESSION["user"]." bloqueado</p>";
echo "<p>Debe esperar a que el administrador le desbloquee</p>";