<?php
    require_once('connection.php');
    // $connection

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['login']) && isset($_POST['mot_de_passe']) && isset($_POST['date_de_naissance']) && isset($_POST['genre']) && isset($_POST['nom']) && isset($_POST['prenom'])){
            createUser($connection);
        }
    }
    function createUser($connection){
        $login = $connection->real_escape_string($_POST['login']);
        $mot_de_passe = $connection->real_escape_string($_POST['mot_de_passe']);
        $date_de_naissance = $connection->real_escape_string($_POST['date_de_naissance']);
        $genre = $connection->real_escape_string($_POST['genre']);
        $nom = $connection->real_escape_string($_POST['nom']);
        $prenom = $connection->real_escape_string($_POST['prenom']);

        $query = "INSERT INTO utilisateur (login, mot_de_passe, date_de_naissance, genre, nom, prenom) VALUES ('$login', '$mot_de_passe', '$date_de_naissance', '$genre', '$nom', '$prenom')";
        $result = $connection->query($query);

        if($result)
            echo $connection->insert_id;
    }
?>