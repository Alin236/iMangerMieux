<?php
$conn = new mysqli("localhost", "root", "", "imangermieux");
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
?>