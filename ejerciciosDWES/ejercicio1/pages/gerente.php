<?php
if($_SESSION["perfil"] == "amigo"){
    header("Location: index.php?page=amigo");
}elseif ($_SESSION["perfil"] == "invitado") {
    header("Location: index.php");
}
echo "<p>Bienvenido ".$_SESSION["user"]." , estas como gerente</p>";

if(isset($_POST["btnNuevaObra"])){
    $portada = "imagen".date("HmsdmY").".jpg";
    move_uploaded_file($_FILES["portada"]["tmp_name"],"./imagenes/".$portada);
    print_r($_FILES);
    $arrayData = array(
        "titulo" => $_POST["titulo"],
        "descripcion" => $_POST["descripcion"],
        "portada" => $portada,
        "fecha_inicio" => $_POST["f_inicio"],
        "fecha_final" => $_POST["f_final"],
        "numero_valoraciones" => 0,
        "valoracion_media" => 0
    );
}
echo "<h2>Formulario nueva obra</h2>";
echo "<form action=\"index.php?page=gerente\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<p>Titulo: <input type=\"text\" name=\"titulo\" required/></p>";
    echo "<p>Descripcion: <input type=\"text\" name=\"descripcion\" required/></p>";
    echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"800000\">";
    echo "<p>Portada: <input type=\"file\" name=\"portada\" required></p>";
    echo "<p>Fecha Inicio: <input type=\"date\" name=\"f_inicio\" required/></p>";
    echo "<p>Fecha Final: <input type=\"date\" name=\"f_final\" required/></p>";
    echo "<p><input type=\"submit\" name=\"btnNuevaObra\" value=\"Agregar obra\"></p>";
echo "</form>";

echo "<h2>Registro de logs</h2>";
$logs = $_SESSION["log"]->get();
echo "<table border=\"1px solid black\">";
echo "<tr><th>Id</th><th>Usuario</th><th>Fecha_hora</th><th>Descripcion</th></tr>";
foreach($logs as $key => $value){
    echo "<tr>";
    foreach($value as $key2 => $value2){
        if($key2= "id"){
            echo "<td>$value2</td>";
        }elseif($key2= "usuario"){
            echo "<td>$value2</td>";
        }elseif($key2 = "fecha_hora"){
            echo "<td>$value2</td>";
        }elseif($key2 = "descripcion"){
            echo "<td>$value2</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
