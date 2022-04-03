<?php
    require_once('connection.php');
    // $connection

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['id_utilisateur']) && isset($_GET['jour'])){
            countFruitVegetable($connection);
        }
    }

    function countFruitVegetable($connection){
        $id_utilisateur = $connection->real_escape_string($_GET['id_utilisateur']);
        $jour = $connection->real_escape_string($_GET['jour']);

        $query = "SELECT SUM(composer.quantite_aliment)/$jour
        FROM utilisateur, repas, composer, aliment, type_aliment
        WHERE utilisateur.id_utilisateur = $id_utilisateur
        AND utilisateur.id_utilisateur = repas.id_utilisateur
        AND repas.id_repas = composer.id_repas
        AND composer.id_aliment = aliment.id_aliment
        AND aliment.id_type_aliment = type_aliment.id_type_aliment
        AND (type_aliment.libelle_type_aliment LIKE '%fruit%'
            OR type_aliment.libelle_type_aliment = 'légumes')
        AND (TO_DAYS(NOW()) - TO_DAYS(repas.date)) < $jour";
        $result = $connection->query($query);

        $result = floatval($result->fetch_all()[0][0]);
        
        echo json_encode($result);
    }
?>