<!DOCTYPE html>
<html>

<head>
    <title>Authentification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <fieldset>
        <legend>Connexion</legend>
        <form method="post" action="login.php">
            <label for="username">Username :</label>
            <input type="text" id="username" name="username">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password">
            <button type="submit" class="btn btn-info">Valider</button> <br>
            <label> ajouter des login</label>
            <a href="addUser.php">cliquez ici</a>
        </form>
    </fieldset>
    <?php
    include "admin/connexion.php";
    
    $sql="SELECT * FROM `user`";
    $querr=$bdd->query($sql);
    foreach ($querr as $row){
        $user=$row["user"];
        $pass=$row["mdp"];
        $mem=crypt($_POST["password"],aliss);
        if($user==$_POST["username"] and $pass==$mem){
            echo('<form action="admin/dashboard.php">
            <button type="submit" lass="btn btn-info">acceder au dashboard</button>
</form>');
            
        }else{
            $check=$check+1;
        }
    }
    ?>
    </div>
    <hr />
</body>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
