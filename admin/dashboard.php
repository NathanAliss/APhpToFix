<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
    <title>Dashboard administrateur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="../actualites.php">page actualité</a>
    <!-- Debut du formulaire -->
    <form enctype="multipart/form-data" action="UPloadScript.php" method="post">
        <fieldset>
            <legend>Créer un article</legend>
            <p>
                <label>titre de l'article</label>
                <input type="text" name="titre"><br>
                <label>Date</label>
                <input type="date" name="dPost"><br>
                <label> contenue</label><br>
                <textarea name="text" rows="5" cols="33"></textarea><br>
                <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">inseret une image :</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
                <input name="fichier" type="file" id="fichier_a_uploader" /><br><br><br>
                <input type="submit" class="btn btn-info" name="submit" value="Uploader l'article" />
            </p>
        </fieldset>
    </form> <!-- Fin du formulaire -->
    <fieldset>
        <legend>paneau de commande article</legend>
        <form action="dashborad.php" method="get">
            <label>id article</label><br>
            <input name="idCheck" type="number" value="0"><br>
            <label>modifier ou surprimé</label><br>
            <select name="modsup">
                <option value="1">Modifié</option>
                <option value="2">suprimé</option>
            </select><br>
            <label>modification du text</label><br>
            <textarea name="Ncontent" rows="5" cols="33"></textarea><br>
            <label> confirmation supression ?</label><br>
            <select name="confirm">
                <option value="false">non</option>
                <option value="true">oui</option>
            </select>
        </form>
        <?php
        include "connexion.php";
        $id=$_GET["idCheck"];
        $action=$_GET["Modsup"];
        
        switch ($action){
                case 1:
                    $content=$_GET["Ncontent"];
                    $req=$bdd->prepare("UPDATE article SET content=:content WHERE id=:id");
                    $req->execute(array("content"=>$content,"id"=>$id));
                break;
                case 2:
                if($_GET["confirm"]==true){
                    $bdd->query("DELETE FROM `article`WHERE id =\".$id.\"");
                    break;
                }else{
                    echo('<script type="\text/javascript\">alter("veuillez confirmé");<script>');
                };
        };
        ?>
    </fieldset>

    <fieldset>
        <legend>Liste des articles</legend>
        <?php
        include "connexion.php";
    $sql="SELECT * FROM `article` ORDER BY `id` ASC";
    echo("<table>
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
</body>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</html>
