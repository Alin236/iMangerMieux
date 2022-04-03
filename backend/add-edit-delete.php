<?php

// Database connection info 
  $host='localhost';
  $username='root';
  $password='';
  $dbname = "imangermieux";
  $conn=mysqli_connect($host,$username,$password,"$dbname");
  mysqli_set_charset($conn, "utf8");


if ($_POST['mode'] === 'add') {
     
     $id = $_POST['id'];
     $nom = $_POST['nom'];
     $type = $_POST['type'];
     
     mysqli_query($conn, "INSERT INTO aliment (id_aliment,nom_aliment,id_type_aliment)
     VALUES ('$id','$nom','$type')");

     echo json_encode(true);
}  

if ($_POST['mode'] === 'edit') {
    
    $result = mysqli_query($conn,"SELECT aliment.id_aliment, aliment.nom_aliment,type_aliment.libelle_type_aliment as type_aliment
    FROM aliment
    JOIN type_aliment 
    ON aliment.id_type_aliment=type_aliment.id_type_aliment 
    WHERE id_aliment='" . $_POST['id'] . "'");
    $row= mysqli_fetch_array($result);

     echo json_encode($row);
}   

if ($_POST['mode'] === 'update') {
     $res = mysqli_query($conn,"SELECT id_type_aliment FROM type_aliment
     WHERE type_aliment.libelle_type_aliment='" . $_POST['type'] . "'");
     $type = json_encode(mysqli_fetch_array($res)['id_type_aliment']);

    mysqli_query($conn,"UPDATE aliment set  id_aliment='" . $_POST['id'] . "', nom_aliment='" . $_POST['nom'] . "', id_type_aliment=$type WHERE id_aliment='" . $_POST['id'] . "'");
    echo json_encode(true);
    
}  

if ($_POST['mode'] === 'delete') {

     mysqli_query($conn, "DELETE FROM aliment WHERE id_aliment='" . $_POST["id"] . "'");
     echo json_encode(true);
}  

?>