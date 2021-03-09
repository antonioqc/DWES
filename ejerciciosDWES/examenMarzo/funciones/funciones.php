<?php

    define("FIL", 20);
    define("COL", 10);
    
   
    
    function limpiarDatos($limpiar){
        $error = trim($limpiar);
        $error = stripslashes($limpiar);
        $error =  htmlspecialchars($limpiar);
        return $error;
    }

    function cerrarSesion(){
        session_unset();
        session_destroy();
        session_start();
        session_regenerate_id();
        header("Location:index.php");
    }

    function crearMapa(){
        $precios = $_SESSION["entrada"]->getPrecioZonas($_GET["comprar"]);
        for ($fila = 0;$fila < FIL;$fila++){	
            for ($columna=0; $columna < COL; $columna++){
                    foreach ($precios as $valuePrecios){
                        if($fila>=0 && $fila <=5){
                            $_SESSION['mapa'][$fila][$columna]="Zona A Precio: ".$valuePrecios["zonaA"];
                        }
                        if($fila>=5 && $fila <=9){
                            $_SESSION['mapa'][$fila][$columna]="Zona B Precio: ".$valuePrecios["zonaB"];
                        }
                        if($fila>=10 && $fila <=19){
                            $_SESSION['mapa'][$fila][$columna]="Zona C Precio: ".$valuePrecios["zonaC"];
                        }
                    
                    }
                }
            }
        }


        function mostrarMapa()
        {
            $id = $_GET["comprar"];
            echo "<table>";
            for($fila=0; $fila < FIL; $fila++) {
                echo "<tr>";
                for($columna = 0; $columna < COL; $columna++) {
                    echo "<td>";
                    echo "<a href=\"index.php?page=entrada&comprar=$id&fila=$fila&columna=$columna\">";
                    echo $_SESSION["mapa"][$fila][$columna];
                    echo "</a></td>";
                }
                echo "</tr>";
            }	
            echo "</table>";	
        }
    
 
?>