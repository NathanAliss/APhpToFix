<!DOCTYPE html>
<html>

<head>
    <title>Adduser</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/style.css">
</head>

<body>
    <fieldset>
        <legend>ajouter un utilisateur</legend>
        <form method="post" action="addUser.php">
            <label for="username">Username :</label>
            <input type="text" id="username" name="username">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password">
            <button name="valide" type="submit" class="btn btn-info" value="1">Valider</button>
        </form>
        <br><p> retourné a la page de conexion : <a href="login.php">cliquez ici</a></p>
    </fieldset>
    
    <?php
    include "admin/connexion.php";
    
    $req=$bdd->prepare("INSERT INTO user (`user`,`mdp`)VALUES(:user,:mdp)");
    $mem=crypt($_POST["password"],aliss);
    $tab=array("user"=>$_POST["username"],"mdp"=>$mem);
    $req->execute($tab);
    $check=$_POST["valide"];
    if($check==true){
        echo('<script type="text/javascript"> alert("Utilisateur ajouter");</script>');
    }
    
    ?>
    </div>
    <hr/>
</body>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
