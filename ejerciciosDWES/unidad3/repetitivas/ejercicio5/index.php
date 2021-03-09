<?php

/**
 * 5.- Dado un mes y un año, mostrar el calendario del mes. Marcar el día actual en verde y los festivos en rojo.
 * @author Antonio Quesada Cuadrado
 */


// VARIABLES

$diasMes = date("t");
$diaSemana = date("N");
$primerDiaSemana = date("N", mktime(0, 0, 0, date("n"), 1, date("Y")));
$contadorDias = 1;
$diaSemanaActual = 1;


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Antonio Quesada Cuadrado">
  <title>Ejercicio 5</title>
</head>

<body>
  <header>
    <h1>Ejercicio 5</h1>
    <?php


    echo "<table border = '1'>";

    echo "<tr><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>";

    do {
      if ($diaSemanaActual == 1) {
        echo "<tr>";
      }
      if (($contadorDias == 1 && $diaSemanaActual != $primerDiaSemana) || ($contadorDias > $diasMes)) {
        echo "<td></td>";
      } else {
        if ($contadorDias == date("d")) {
          echo "<td class = 'hoy'>" . $contadorDias++ . "</td>";
        } else {
          echo "<td class = " . ($diaSemanaActual % 7 == 0 ? "festivo" : "") . ">" . $contadorDias++ . "</td>";
        }
      }
      $diaSemanaActual++;

      if ($diaSemanaActual == 8) {
        echo "</tr>";
        $diaSemanaActual = $contadorDias >= $diasMes ? 8 : 1;
      }
    } while ($contadorDias <= $diasMes && $diaSemanaActual != 8);

    echo "</table>";

    ?>



  </header>
  <nav></nav>
  <aside></aside>
  <main></main>
  <footer></footer>

</body>

</html>