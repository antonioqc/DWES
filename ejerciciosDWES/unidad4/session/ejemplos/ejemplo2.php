<?php
session_start();
echo session_id();
if (isset($_SESSION["mensaje"])) {
    echo "<br/>".$_SESSION["mensaje"];
} else {
    $_SESSION["mensaje"]="Hola mundo";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    </body>
</html>