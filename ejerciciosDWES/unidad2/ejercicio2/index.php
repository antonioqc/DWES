<?php
    //Valor del radio y area(pi*radio al cuadrado)
    $radio = 5;
    $area = pi()*pow($radio,2);
    $img = "img/CircleArea.gif";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Círculo</title>
</head>
<body>
    <?php
        echo "<h2>Área de un Círculo</h2>";
        echo "Radio: $radio";
        echo "<p>El área del círculo es $area.</p>";
        echo "<p><img src= $img width= 300px></img></p>";
    ?>
</body>
</html>