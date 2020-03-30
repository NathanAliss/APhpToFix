<!DOCTYPE html>
<html>

<head>
    <title>Authentification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/style.css">
</head>

<body>
    <fieldset>
        <legend>Connexion</legend>
        <form method="post" action="login.php">
            <input placeholder="Nom d'utisateur" type="text" id="username" name="username">
            <input placeholder="Mot de passe" type="password" id="password" name="password">
            <input type="submit" class="btn" value="Ce connecter"></input> <br>
            
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
            echo('<form method="post" action="admin/dashboard.php">
            <br>
            <input type="text" name="nav" value="'.$mem.'" style="display:none">
            <button type="submit" class="btn btn-info">acceder au dashboard</button>
</form>');
        }else{
            $check=$check+1;
        }
    }
    ?>
    </div>
</body>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
