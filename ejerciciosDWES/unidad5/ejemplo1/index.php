<?php
require_once "app/model/Persona.php";
require_once "app/model/Alumno.php";

$persona = new Persona("Antonio","Quesada","Cuadrado");
$persona->saluda();
echo $persona->Nombre();
echo "<br/>Objeto persona creado<br/>";
var_dump($persona); 

/* $clase = "Persona";
$alumno2 = new $clase;
$alumno2->saluda(); */

$alumno1 = new Alumno("Antonio","Quesada","Cuadrado");
$alumno1->saluda();