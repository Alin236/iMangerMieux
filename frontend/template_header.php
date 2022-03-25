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
        <link href=\"tp1.css\" rel=\"stylesheet\" type=\"text/css\">
    </head>
    <body>
        <header><h1>iMangerMieux</h1>$connection</header>";
?>