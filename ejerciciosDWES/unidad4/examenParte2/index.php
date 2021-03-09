<?php
session_start();

function clearData($cadena)
{
    $cadenaLimpia = htmlspecialchars($cadena);
    $cadenaLimpia = trim($cadenaLimpia);  // para quitar espacios al principio y al final
    $cadenaLimpia = stripslashes($cadenaLimpia); // para quitar las barras de un string
    return $cadenaLimpia;
}

//Inicialización variables
$user = "";
$psw = "";
$msgError = "";
$procesaFormulario = false;

//Comprobamos si no exiten las variables de session
if (!isset($_SESSION['aut'])) {
    $_SESSION['aut'] = false;
    $_SESSION['user'] = 'Invitado';
}


//Validación
if (isset($_POST['enviar'])) {
    $user = clearData($_POST['user']);
    $psw = clearData($_POST['psw']);
    $procesaFormulario = true;

    if (empty($user)) {
        $msgError = "Sin rellenar";
        $procesaFormulario = false;
    }

    if (empty($psw)) {
        $msgError = "Sin rellenar";
        $procesaFormulario = false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <h1>Autentificación</h1>
</header>
<nav>
    <?php
    echo "<a href=\"index.php\">Inicio | </a>";
    echo "<a href=\"agente.php\">Agente |</a>";
    echo "<a href=\"admin.php\">Administrador |</a>";
    ?>;
</nav>

<?php
    echo "<p>" . "Usted está como " . $_SESSION['user'] . "</p>";

    if ($_SESSION['aut']) {
        echo "<a href=\"index.php\">Inicio</a>";
        echo "<a href=\"agente.php\">Agente</a>";
        echo "<a href=\"cierresesion.php\">Cierra Sesión</a>"; 
    } else {
        echo "<form action=\"index.php\" method=\"POST\">";
        echo "Usuario: <input type=\"text\" name=\"user\" value=" . $user . "></br>";
        echo "Contraseña: <input type=\"password\" name=\"psw\" value=" . $psw . "></br>";
        echo "<input type=\"submit\" name=\"enviar\" value =\"enviar\" ></a>";
        echo "</form>";
    }
    ?>

<body>
    <?php
    if ($procesaFormulario) {
        if (($user == 'admin') && ($psw == 'admin')) {
            $_SESSION['aut'] == true;
            $_SESSION['user'] == 'Administrador';
        }
    }

    ?>
</body>

</html>