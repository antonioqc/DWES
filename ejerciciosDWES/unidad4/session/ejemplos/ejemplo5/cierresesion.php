<?php
session_start();
//session_unset($_SESSION);
session_destroy();
session_start();
session_regenerate_id(true);
header('Location: index.php');
?>