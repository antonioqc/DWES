<?php
$mostrarLista = $_SESSION["obra"]->getProximasObras(date("Y-m-d H:i:s"));
echo "<p><b>Listado de Estrenos</b></p>";
echo "<table>";
       echo "<tr><th>Titulo</th><th>Descripción</th><th>Portada</th><th>Fecha Inicio</th><th>Fecha Final</th><th>Comprar Entrada</th></tr>";
       foreach ($mostrarLista as $value){
           echo "<tr>";
               echo "<td>"; 
                   echo $value['titulo'];
               echo "</td>";
               echo "<td>"; 
                   echo $value['descripcion'];
               echo "</td>";
               echo "<td>"; 
                    echo "<img src=./img/".$value["portada"]." alt=\"Imagen de la obra\" width=\"70\" height=\"70\">";
               echo "</td>";   
               echo "<td>"; 
                   echo $value['fecha_inicio'];
               echo "</td>"; 
               echo "<td>"; 
                   echo $value['fecha_final'];
               echo "</td>";  
               echo "<td><a href='"."index.php?page=entrada&comprar=".$value["id"]."'><button>Comprar</button></a></td>";
           echo "</tr>";
        }    
        echo "</table>"; 

?>   