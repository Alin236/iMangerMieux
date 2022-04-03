<?php
    //On simule une base de données
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'iMangerMieux';

    //On établit la connexion
    $connection = new mysqli($servername, $username, $password, $database);
    mysqli_set_charset($connection, "utf8");
    

    //On vérifie la connexion
    if($connection->connect_error){
        die('Erreur : ' .$connection->connect_error);
    }
?>