<?php
// // get the q parameter from URL
// $q = $_REQUEST["q"];

// $hint = "";

// // lookup all hints from array if $q is different from ""
// if ($q !== "") {
//   $q = strtolower($q);
//   $len=strlen($q);
//   foreach($a as $name) {
//     if (stristr($q, substr($name, 0, $len))) {
//       if ($hint === "") {
//         $hint = $name;
//       } else {
//         $hint .= ", $name";
//       }
//     }
//   }
// }

// // Output "no suggestion" if no hint was found or output correct values
// echo $hint === "" ? "no suggestion" : $hint;

$q = intval($_GET['q']);

$con = mysqli_connect('localhost','superheroes','1234','bd_superheroes');

mysqli_select_db($con,"ajax_demo");
$sql="SELECT nombre FROM superheroes";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Nombre</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>