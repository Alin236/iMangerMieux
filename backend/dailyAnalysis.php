<?php
    require_once('connection.php');
    // $connection

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['id_utilisateur'])){
            dailyAnalysis($connection);
        }
    }

    function dailyAnalysis($connection){
        $id_utilisateur = $connection->real_escape_string($_GET['id_utilisateur']);

        $query = "SELECT apport.libelle_apport, SUM(comporter.quantite_apport*composer.quantite_aliment)
        FROM utilisateur, repas, composer, comporter, apport
        WHERE utilisateur.id_utilisateur = $id_utilisateur
        AND utilisateur.id_utilisateur = repas.id_utilisateur
        AND repas.id_repas = composer.id_repas
        AND composer.id_aliment = comporter.id_aliment
        AND comporter.id_apport = apport.id_apport
        AND (TO_DAYS(NOW()) - TO_DAYS(repas.date)) < 1
        GROUP BY apport.libelle_apport";
        $result = $connection->query($query);

        $result = $result->fetch_all();

        $data = array();
        foreach ($result as $row) {
            $data[$row[0]] = $row[1];
        }

        echo json_encode($data);
    }
?>