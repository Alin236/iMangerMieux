<?php
    require_once('connection.php');
    // $connection

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['login']) && isset($_POST['mot_de_passe']) && isset($_POST['date_de_naissance']) && isset($_POST['genre']) && isset($_POST['nom']) && isset($_POST['prenom'])){
            createUser($connection);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['login']) && isset($_POST['mot_de_passe'])){
            verifyUser($connection);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if(isset($_GET['id_utilisateur']) && isset($_GET['login']) && isset($_GET['date_de_naissance']) && isset($_GET['genre']) && isset($_GET['nom']) && isset($_GET['prenom'])){
            editUser($connection);
        }
    }

    function createUser($connection){
        $login = $connection->real_escape_string($_POST['login']);
        $mot_de_passe = $connection->real_escape_string($_POST['mot_de_passe']);
        $date_de_naissance = $connection->real_escape_string($_POST['date_de_naissance']);
        $genre = $connection->real_escape_string($_POST['genre']);
        $nom = $connection->real_escape_string($_POST['nom']);
        $prenom = $connection->real_escape_string($_POST['prenom']);

        $query = "INSERT INTO utilisateur (id_utilisateur, login, mot_de_passe, date_de_naissance, genre, nom, prenom) VALUES (NULL, '$login', '$mot_de_passe', '$date_de_naissance', '$genre', '$nom', '$prenom')";
        $result = $connection->query($query);

        if($result){
            echo $connection->insert_id;
        }
    }

    function verifyUser($connection){
        $login = $connection->real_escape_string($_POST['login']);
        $mot_de_passe = $connection->real_escape_string($_POST['mot_de_passe']);

        $query = "SELECT mot_de_passe FROM utilisateur WHERE login = '$login'";
        $result = $connection->query($query);
        $mot_de_passe_bdd = $result->fetch_row()[0];

        if($mot_de_passe == $mot_de_passe_bdd){
            echo true;
        }
    }

    // fonction inutilisé ?
    function getUser($connection, $id_utilisateur){

        $query = "SELECT nom, prenom, login, date_de_naissance FROM utilisateur WHERE id_utilisateur = $id_utilisateur";
        $result = $connection->query($query);

        echo json_encode($result->fetch_all());
    }

    function editUser($connection){
        $id_utilisateur = $connection->real_escape_string($_GET['id_utilisateur']);
        $login = $connection->real_escape_string($_GET['login']);
        $date_de_naissance = $connection->real_escape_string($_GET['date_de_naissance']);
        $genre = $connection->real_escape_string($_GET['genre']);
        $nom = $connection->real_escape_string($_GET['nom']);
        $prenom = $connection->real_escape_string($_GET['prenom']);

        $query = "UPDATE utilisateur SET login = '$login', date_de_naissance = '$date_de_naissance', genre = '$genre', nom = '$nom', prenom = '$prenom' WHERE utilisateur.id_utilisateur = $id_utilisateur";
        $result = $connection->query($query);

        echo $result;
    }
?>