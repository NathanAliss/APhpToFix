<?php
/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=bddraynald;host=localhost';
$user = 'root';
$password = 'root';

try {
    $bdd = new PDO($dsn, $user, $password);
    //echo("<br><hr><br>Acces BDD Okay<br><hr><br>");
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>
