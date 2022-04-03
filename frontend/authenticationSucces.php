<?php
    session_start();
    if(isset($_POST['id_utilisateur']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['genre']) && isset($_POST['date_de_naissance'])){
        $_SESSION['id_utilisateur'] = $_POST['id_utilisateur'];
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['genre'] = $_POST['genre'];
        $_SESSION['date_de_naissance'] = $_POST['date_de_naissance'];
        echo true;
    }
?>