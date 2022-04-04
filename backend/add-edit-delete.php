<?php
 
  require("connection.php");
  mysqli_set_charset($connection, "utf8");


if ($_POST['mode'] === 'add') {
     
     $id = $_POST['id'];
     $nom = $_POST['nom'];
     $eau = $_POST['eau'];
     $sel = $_POST['sel'];
     $sucre = $_POST['sucre'];
     $alcool = $_POST['alcool'];
     $vitamine = $_POST['vitamine'];
     
     $res = mysqli_query($connection,"SELECT id_type_aliment FROM type_aliment
     WHERE type_aliment.libelle_type_aliment='" . $_POST['type'] . "'");
     $id_type = json_encode(mysqli_fetch_array($res)['id_type_aliment']);
     
     mysqli_query($connection, "INSERT INTO aliment (nom_aliment,id_type_aliment)
     VALUES ('$nom',$id_type)");
     /**Recuperation de l'id de l'aliment inseré */
     $id_aliment = $connection->insert_id;

     mysqli_query($connection, "INSERT INTO composer (id_apport,id_aliment,quantite_apport)
     VALUES ('5',$id_aliment,'$eau')");

     mysqli_query($connection, "INSERT INTO comporter (id_apport,id_aliment,quantite_apport)
     VALUES (5,$id_aliment,'$eau'),(10,$id_aliment,'$sucre'),(41,$id_aliment,'$sel'),(21,$id_aliment,'$alcool'),(60,$id_aliment,'$vitamine')");
    

     echo json_encode(true);
     echo $id_aliment;
}  

if ($_POST['mode'] === 'edit') {
    
    $result = mysqli_query($connection,"SELECT aliment.id_aliment, aliment.nom_aliment,type_aliment.libelle_type_aliment as type_aliment
    FROM aliment
    JOIN type_aliment 
    ON aliment.id_type_aliment=type_aliment.id_type_aliment 
    WHERE id_aliment='" . $_POST['id'] . "'");
    $row= mysqli_fetch_array($result);

     echo json_encode($row);
}   

if ($_POST['mode'] === 'update') {
     $res = mysqli_query($connection,"SELECT id_type_aliment FROM type_aliment
     WHERE type_aliment.libelle_type_aliment='" . $_POST['type'] . "'");
     $type = json_encode(mysqli_fetch_array($res)['id_type_aliment']);

    mysqli_query($connection,"UPDATE aliment set  id_aliment='" . $_POST['id'] . "', nom_aliment='" . $_POST['nom'] . "', id_type_aliment=$type WHERE id_aliment='" . $_POST['id'] . "'");
    echo json_encode(true);
    
}  

if ($_POST['mode'] === 'delete') {

     mysqli_query($connection, "DELETE FROM comporter WHERE id_aliment='" . $_POST["id"] . "'");
     mysqli_query($connection, "DELETE FROM aliment WHERE id_aliment='" . $_POST["id"] . "'");
     echo json_encode(true);
}  

?>