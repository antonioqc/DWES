<?php

$directorio = 'upload/';
$ficheros  = scandir($directorio);

foreach ($ficheros as $value) {
    if($value != "." && $value != "..") {
        echo "<img src='upload/$value'>";
        //echo "<img src = \"$directorio\"$value\"/>";
    }
}

?>


