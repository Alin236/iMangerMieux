<?php
    session_start();
    $connection;
    if(isset($_SESSION['login'])){
        $connection = '<p>Bienvenue '.$_SESSION['login'].'</p>';
    }
    else{
        $connection = '<a href="http://imangermieux/frontend/index.php?page=connection">Connexion</a>';
    }
    echo "<!DOCTYPE HTML>
        <html lang=\"fr\">
        <head> 
            <title>iMangerMieux</title> 
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"/>
            <link href=\"css/tp1.css\" rel=\"stylesheet\" type=\"text/css\">
            <script src=\"https://code.jquery.com/jquery-3.5.1.min.js\"></script>
            <script src=\"https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js\"></script>
        </head>
        <body>
            <header><h1>iMangerMieux</h1>$connection</header>";
?>
