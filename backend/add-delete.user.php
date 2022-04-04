


<?php
 
  require("connection.php");
 


if ($_POST['mode'] === 'add') {
     
    $id_utili = $_POST['id'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    
    $quantite = $_POST['quantite'];
    /** Pour recuperer l'id type du repas à partir du nom */
    $res_repas = mysqli_query($connection, "SELECT id_type_repas FROM type_repas WHERE type_repas.libelle_repas='".$_POST['type']."'");
    $id_type_repas = json_encode(mysqli_fetch_array($res_repas)['id_type_repas']);

    /** Pour recuperer l'id aliment  à partir du nom aliment */

    $res = mysqli_query($connection,"SELECT id_aliment FROM aliment
     WHERE aliment.nom_aliment='" . $_POST['nomaliment']. "'");
    $id_aliment = json_encode(mysqli_fetch_array($res)['id_aliment']);

    mysqli_query($connection, "INSERT INTO repas (id_type_repas,date,id_utilisateur)
    VALUES ($id_type_repas,'$date','$id_utili')");

    /** Pour recuperer l'id du repas  qui vient d'être inserer */

    //$req = mysqli_query($connection,"SELECT MAX(id_repas) FROM repas
    //WHERE repas.id_utilisateur='" . $_POST['id']. "'");
    $id_repas = $connection->insert_id;

    
 

    mysqli_query($connection, "INSERT INTO composer (id_aliment,id_repas,quantite_aliment)
    VALUES ($id_aliment,$id_repas,'$quantite')");
    
    
   

    
    echo json_encode($id_repas);
}  

 

if ($_POST['mode'] === 'delete') {
  $id =  $_POST["id"];
     mysqli_query($connection, "DELETE  FROM composer WHERE  composer.id_repas=$id;");
     mysqli_query($connection, "DELETE  FROM repas WHERE repas.id_repas=$id");
     echo json_encode(true);
}  

?>

