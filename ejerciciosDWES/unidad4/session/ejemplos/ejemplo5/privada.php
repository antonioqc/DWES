<?php
session_start();
$aut = $_SESSION['aut'] ?? false;
if (!$aut) {
    header('location: index.php');
}

echo "zona privada";
?>