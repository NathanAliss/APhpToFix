<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
    <title>Dashboard administrateur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    include "connexion.php";
    $sql="SELECT * FROM `user`";
    $querr=$bdd->query($sql);
    foreach ($querr as $row){
        $pass=$row["mdp"];
        $nav=$_POST["password"];
        //$nav=crypt($nav,aliss);
        echo("pass -> $pass<br> nav -> $nav");
        if ($nav==$pass){
    ?>
    <a href="../actualites.php">page actualité</a>
    <!-- Debut du formulaire -->
    <form enctype="multipart/form-data" action="UPloadScript.php" method="post">
        <fieldset>
            <legend>Créer un article</legend>
            <p>
                <table class="UI">
                    <tr>
                        <td><label>titre de l'article</label></td>
                        <td><label>Date</label></td>
                        <td><label> contenue</label></td>
                        <td><label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">inseret une image :</label></td>
                    </tr>
                    <td><input type="text" name="titre">
                    <td><input type="date" name="dPost"></td>
                    <td><textarea name="text" rows="5" cols="33"></textarea></td>
                    <td><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" /> <input name="fichier" type="file" id="fichier_a_uploader" /></td>
                    </td>
                </table>
                <br><br><br>
                <input type="submit" class="btn btn-info" name="submit" value="Uploader l'article" />
            </p>
        </fieldset>
    </form> <!-- Fin du formulaire -->
    <fieldset>
        <legend>paneau de commande article</legend>
        <form method="get" action="dashboard.php">
            <table class="UI">
                <tr>
                    <td><label>id article</label></td>
                    <td><label>modifier ou surprimé l'article</label></td>
                    <td><label>modification du text</label></td>
                    <td><label> confirmation supression ?</label></td>
                </tr>
                <tr>
                    <td><input name="idCheck" type="number" value="0"></td>
                    <td><select name="modsup">
                            <option value="1">Modifié</option>
                            <option value="2">suprimé</option>
                        </select></td>
                    <td><textarea name="Ncontent" rows="5" cols="33"></textarea></td>
                    <td><select name="confirm">
                            <option value="0">non</option>
                            <option value="1">oui</option>
                        </select></td>
                </tr>
            </table><br>
            <input type="submit" class="btn btn-info" name="submit" value="effectuer l'action" />
        </form>

        <?php
        include "connexion.php";
        
        $id=$_GET["idCheck"];
        $action= $_GET["modsup"];
        $confirm=$_GET["confirm"];
        
        switch ($action){
                case 1:
                    
                    $content=$_GET["Ncontent"];
                    $req=$bdd->prepare("UPDATE article SET content=:content WHERE id=:id");
                    $req->execute(array("content"=>$content,"id"=>$id));
                    
                break;
                case 2:
                
                if( $confirm==true){
                    
                    $bdd->query("DELETE FROM `article` WHERE `article`.`id`=".$id);
                    
                    break;
                }else if($action==2&&$confirm==false){
                   
                    echo('<script type="text/javascript"> alert("veuillez confirmé");</script>');
                    
                }
        }
        ?>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>Liste des articles</legend>
        <?php
        include "connexion.php";
    $sql="SELECT * FROM `article` ORDER BY `id` DESC";
    echo("<table id=\"affichearticle\">
    <tr>
    <th>id</th><th>titre</th><th>date de poste</th>
<tr>");  
        $test=$bdd->query($sql);
foreach($test as $row){
    $id= $row["id"];
    $name= $row["titre"];
    $dPost= $row["dPost"];
echo("<tr>
<td>$id</td><td>$name</td><td>$dPost</td>
</tr>");
};
        
echo("</table>");
        ?>
    </fieldset>

    <?php
            
        }else{
            echo('<h2>merci de vous connecter</h2>
            <p>pour vous autantifier <a href="../login.php">cliquez ici</a> <br>');
        }}
    echo("<br><hr><br>");
    foreach($_POST as $key => $value){
        echo("| key -> $key / value -> $value ");
    }
        ?>
</body>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
