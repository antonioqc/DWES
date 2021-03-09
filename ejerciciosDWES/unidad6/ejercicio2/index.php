<?php
/**
 * Index.php
 * Autor: Antonio Quesada Cuadrado
 */

include("Superheroe.php");

//Nombre es $POST
$datos = array("nombre" => "Spiderman",
                "velocidad"=> 8);

// //Singleton
// echo "Clases sin instancias <br/>";
// $sh_sing1 = Superheroe::getInstancia();
// var_dump($sh_sing1);
// $sh_sing2 = Superheroe::getInstancia();
// var_dump($sh_sing2);
// $sh_sing3 = Superheroe::getInstancia();
// var_dump($sh_sing3);

// echo "Instanciando objetos <br/>";
// $sh_sing1 = new Superheroe();
// var_dump($sh_sing1);
// $sh_sing2 = new Superheroe();
// var_dump($sh_sing2);
// $sh_sing3 = new Superheroe();
// var_dump($sh_sing3);

$sh = Superheroe::getInstancia();
$sh->set($datos);
echo "----". $sh->getMensaje()."</br>";

//Recuperamos el registro introducido
$id = $sh->lastInsert();
$datos = $sh->get($id);
foreach ($datos as $elemento) {
    foreach ($elemento as $key => $valor) {
        echo "$key: $valor</br>";
    }
}

//Modificamos un libro
echo "Modificamos un registro";
$datos = array("id"=> 122, "nombre" => "Superman",
                "velocidad"=> 9);
$sh->edit($datos);
echo "----". $sh->getMensaje()."</br>";




