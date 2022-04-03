<?php
    require_once('connection.php');
    // $connection

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['login']) && isset($_POST['mot_de_passe'])){
            if(isset($_POST['date_de_naissance']) && isset($_POST['genre']) && isset($_POST['nom']) && isset($_POST['prenom'])){
                if(createUser($connection)){
                    authenticateUser($connection);
                };
            }
            else{
                authenticateUser($connection);
            }
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

        return $result;
    }

    function authenticateUser($connection){
        $login = $connection->real_escape_string($_POST['login']);
        $mot_de_passe = $connection->real_escape_string($_POST['mot_de_passe']);

        $query = "SELECT id_utilisateur, nom, prenom, login, genre, date_de_naissance FROM utilisateur WHERE login = '$login' AND mot_de_passe='$mot_de_passe'";
        $result = $connection->query($query);
        $user = $result->fetch_all();

        if($user != []){
            echo json_encode($user);
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