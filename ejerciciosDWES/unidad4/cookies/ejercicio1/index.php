<?php
/**
 *  Escriba una página que permita crear una cookie de duración limitada, comprobar el estado de la cookie y destruirla.
 */

    //$cookie = $_COOKIE["user"] ?? null

    if (isset($_COOKIE["user"])) {
        echo $_COOKIE["user"];
    } else {
        setcookie("user","Edgar Allan Poe", time()+3600);
    }

?>