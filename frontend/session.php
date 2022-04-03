<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['id_utilisateur']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['genre']) && isset($_POST['date_de_naissance'])){
            $_SESSION['id_utilisateur'] = $_POST['id_utilisateur'];
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['mail'] = $_POST['mail'];
            $_SESSION['genre'] = $_POST['genre'];
            $_SESSION['date_de_naissance'] = $_POST['date_de_naissance'];
            echo true;
        }
        else if(isset($_POST['disconnect']) && $_POST['disconnect']){
            $_SESSION = array();
            echo true;
        }
    }
?>