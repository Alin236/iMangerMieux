<?php
    session_start();
    $_SESSION['id_utilisateur'] = 24;
    $_SESSION['nom'] = 'riri';
    $_SESSION['prenom'] = 'fifi';
    $_SESSION['mail'] = 'riri@etu.imt-lille-douai.fr';
    $_SESSION['genre'] = 'M';
    $_SESSION['date_de_naissance'] = '2000-11-02';
    $textConnection;
    if(isset($_SESSION['login'])){
        $textConnection = '<p>Bienvenue '.$_SESSION['login'].'</p>';
    }
    else{
        $textConnection = '<a href="http://imangermieux/frontend/index.php?page=connection">Connexion</a>';
    }
?>
<!DOCTYPE HTML>
<html lang="fr">
<head> 
    <title>iMangerMieux</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <header><h1>iMangerMieux</h1><?php echo $textConnection ?></header>
