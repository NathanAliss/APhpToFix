<?php
/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=bddraynald;host=localhost';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "<br><hr><br>accès bdd ok<br><hr><br>";
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>
