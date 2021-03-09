<?php
require_once "app/models/Persona.php";
require_once "app/models/Perro.php";

use app\models\Persona;
use app\models\Perro;

$persona = new Persona();
$persona->saluda();

$perro = new Perro();
$perro->saluda();