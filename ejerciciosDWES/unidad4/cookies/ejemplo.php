<?php

$user = "";
$psw = "";

if (isset($_POST["enviar"])) {
    if ($_POST["recordar"] == true) {
        setcookie("user", $_POST["user"], time() + 3600);
        setcookie("psw", $_POST["psw"], time() + 3600);
    } else {
        setcookie("user", $_POST["user"], time() - 3600);
        setcookie("psw", $_POST["psw"], time() - 3600);
    }

    if($_POST["borrar"] == true){
        setcookie("user", $_POST["user"], time() - 3600);
        setcookie("psw", $_POST["psw"], time() - 3600); 
    }

    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE['user'];
    }
    if (isset($_COOKIE["user"])) {
        $psw = $_COOKIE['psw'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies</title>
</head>

<body>
    <?php
    echo "<form action=\"ejemplo.php\" method=\"POST\">";
    echo "Usuario: <input type=\"text\" name=\"user\" value=" . $user . "></br>";
    echo "Contraseña: <input type=\"password\" name=\"psw\" value=" . $psw . "></br>";
    echo "Recordar Datos: <input type=\"checkbox\" name=\"recordar\" value=\"recordar\" ></br>";
    echo "Borrar Información: <input type=\"checkbox\" name=\"borrar\" value=\"borrar\" ></br>";
    echo "<input type=\"submit\" name=\"enviar\" value =\"enviar\" ></a>";
    echo "</form>";
    ?>
</body>

</html>