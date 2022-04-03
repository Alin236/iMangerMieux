<?php

require("connection.php");
$request = mysqli_real_escape_string($connection, $_POST["query"]);
$query = "
 SELECT * FROM aliment WHERE nom_aliment LIKE '%".$request."%'
";

$result = mysqli_query($connection, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["libelle_type_aliment"];
 }
 echo json_encode($data);
}
else {
    $data[]="No data found";
    echo json_encode($data); }

?>