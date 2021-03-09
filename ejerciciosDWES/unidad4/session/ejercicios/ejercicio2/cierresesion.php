<?php
session_start();
session_destroy();
session_start();
session_regenerate_id(true);
header('Locate: index.php');
echo "Has cerrado sesión";
echo "</br>";
echo "<a href=\"index.php\">Volver</a>";
?>