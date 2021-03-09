<?php
function manejoVariablesEstaticas(){
    static $varEstatica = 0;
    $variable = 0;
    $varEstatica++;
    $variable++;
    echo $varEstatica;
    echo $variable;
}

echo "<p>Llamada 1</p>";
manejoVariablesEstaticas();
echo "<p>Llamada 2</p>";
manejoVariablesEstaticas();
echo "<p>Llamada 3</p>";
manejoVariablesEstaticas();
?>