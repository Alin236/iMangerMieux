<?php
    session_start();
    $textConnection;
    if(isset($_SESSION['id_utilisateur'])){
        $textConnection = '<p>Bienvenue '.$_SESSION['prenom'].'</p>';
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
        <!-- DataTables CSS librairie -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
        </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- DataTables JS librairie -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

   
  
    
</head>
<body>
    <header><h1>iMangerMieux</h1><?php echo $textConnection ?></header>
