<?php
    session_start();
    $textConnection;
    if(isset($_SESSION['id_utilisateur'])){
        $textConnection = '<a href="index.php?page=profil">'.$_SESSION['prenom'].' '.$_SESSION['nom'].'</a>';
    }
    else{
        $textConnection = '<a href="index.php?page=connection">Connexion</a>';
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
    <script src="https://d3js.org/d3.v7.min.js"></script>
</head>
<body>
    <header class="bg-light">
        <h1 class="text-center">iMangerMieux</h1>
        <p class="text-end m-0 px-4"><?php echo $textConnection ?></p>
    </header>
