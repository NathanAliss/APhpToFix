<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
    <title>Upload d'une image sur le serveur !</title>
</head>

<body>

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
                <input type="submit" name="submit" value="Uploader l'article" />
            </p>
        </fieldset>
    </form> <!-- Fin du formulaire -->
    <fieldset>
        <legend>Liste des articles</legend>
        <?php
    $sql="SELECT * FROM `article` ORDER BY `id` ASC";
    echo("<table>
    <tr>
    <th>id</th><th>titre</th><th>date de poste</th><th>action<th>
<tr>");  
        $test=$bdd->query($sql);
foreach($test as $row){
    $id= $row["id"];
    $name= $row["titre"];
    $dPost= $row["dPost"];
echo("<tr>
<td>$id</td><td>$name</td><td>$dPost</td><td><button>modifier l'article</button><br><button>supprimer l'article</button></td>
</tr>");
};
        
echo("</table>");
    
//test
echo ("<br><br><hr><br>$id,$name,$dPost<br><br><hr><br>");
var_dump($row);

        ?>
    </fieldset>
</body>

</html>
