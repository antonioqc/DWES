<?php  
$msgError = "";
    if(!isset($_SESSION["perfiles_perfil"] ) || ($_SESSION["perfiles_perfil"] !=="gerente")){
        header("Location: index.php?page=index");
    }

    echo "<h2>Obras</h2>";
    echo "<form action='index.php?page=gerente' enctype=\"multipart/form-data\" method=\"post\">";
    echo "<input type='text' name='titulo' placeholder='titulo'>
        <br><br>
        <input type='text' name='descripcion' placeholder='descripcion'>
        <br><br>
        <input type='file' name='file' id='imagen' placeholder='imagen'>
        <br><br>
        <input type='date' name='fechainicio' placeholder='fechainicio'>
        <br><br>
        <input type='date' name='fechafinal' placeholder='fechafinal'>
        <br><br>";
    echo "<input type='submit' value='Nueva Obra' name='annadir'>";
    echo "</form>";

    if (empty($_POST["titulo"]) || empty($_POST["descripcion"]) || empty($_POST["fechainicio"]) || empty($_POST["fechafinal"])) {
        $msgError = "Revise de nuevo. No ha rellenado todos los campos.";   
    } 
    
    if(isset($_POST["annadir"])){
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        if ((($_FILES["file"]["type"] == "image/gif") 
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 20000000000) 
            && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Error: " . $_FILES["file"]["error"] . "<br/>";
            } else {
                if (file_exists("img/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    "img/" . $_FILES["file"]["name"]);
                }      
            }
        }
        else {
            echo "<br></br>";
            echo "<b>Debe seleccionar una imagen</b>";
        }

        $array_datos = array(
            'titulo'=>$_POST["titulo"],
            'portada'=>$_FILES["file"]["name"],
            'descripcion'=>$_POST["descripcion"],
            'fechainicio'=>$_POST["fechainicio"],
            'fechafinal'=>$_POST["fechafinal"],
        );

        $_SESSION["obras"]->annadirObra($array_datos);   
        echo "<br><br>";
        echo "<b>".$msgError."</b>";  
    } 

    echo "<h2>Listado de Logs</h2>";
    $listadoLogs = $_SESSION["logs"]->getLogs();
    echo "<table border=1>";
    echo "<tr><th>Fecha / Hora</th><th>Usuario</th><th>Descripción</th></tr>";
    foreach ($listadoLogs as $value){
        echo "<tr>";
            echo "<td>"; 
                echo $value['fecha_hora'];
            echo "</td>";
            echo "<td>"; 
                echo $value['usuario'];
            echo "</td>";
            echo "<td>"; 
                echo $value['descripcion'];
            echo "</td>";
        echo "</tr>";
    }    
    echo "</table>";

?>
