<?php
// require_once "app/models/Persona.php";
// require_once "app/models/Perro.php";
require_once "vendor\autoload.php";

use App\Models\Persona;
use App\Models\Perro;

$persona = new Persona();
$persona->saluda();

$perro = new Perro();
$perro->saluda();