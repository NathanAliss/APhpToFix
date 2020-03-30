<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
    <title>Dashboard administrateur</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body>
    <?php
            
        include "connexion.php";
    
    $sql="SELECT * FROM `user`";
    $querr=$bdd->query($sql);
    foreach ($querr as $row){
        $pass=$row["mdp"];
        $pass=crypt($pass,kapa);
        $nav=$_POST["nav"];
        if ($nav==$pass){
    ?>

    <h1>Dashboard</h1>
    <h2>Gestion de vos articles</h2>

    <!-- Debut du formulaire -->

    <fieldset>

        <legend>Créer un article</legend>

        <form enctype="multipart/form-data" action="UPloadScript.php" method="post">




            <div>

                <input type="text" name="titre" placeholder="Titre de l'article">
            </div>
            <div>

                <input type="date" name="dPost">
            </div>
            <div>

                <textarea name="text" rows="5" cols="33" placeholder="Inserer votre contenu d'article"></textarea>
            </div>
            <div>
                <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Seletionner votre image</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" /> <input name="fichier" type="file" id="fichier_a_uploader" />

            </div>
            <?php
            echo('<input type="text" name="nav" value="'.$nav.'" style="display:none">')
            ?>
            <input type="submit" class="btn btn-info" name="submit" value="Ajouter l'article" />


        </form>
    </fieldset>

    <fieldset>

        <legend>Panneau de commande article</legend>

        <form method="post" action="dashboard.php">



            <table class="UI">

                <div>
                    <label>Id de l'article</label>
                    <input name="idCheck" type="number" value="0">
                </div>
                <div>
                    <label>Action</label>
                    <select name="modsup">
                        <option value="1">Modifier</option>
                        <option value="2">supprimer</option>
                    </select>
                </div>
                <div>
                    <label>Modification du texte</label>
                    <textarea name="Ncontent" rows="5" cols="33"></textarea>
                </div>
                <div>
                    <label>Confirmation supression ?</label>
                    <select name="confirm">
                        <option value="0">non</option>
                        <option value="1">oui</option>
                    </select>
                    <?php echo('<input type="text" name="nav" value="'.$nav.'" style="display:none">');
            ?>
                </div>
            </table>

            <input type="submit" class="btn btn-info" name="submit" value="Effectuer l'action" />
        </form>

        <?php
        include "connexion.php";
        
        $id=$_POST["idCheck"];
        $action= $_POST["modsup"];
        $confirm=$_POST["confirm"];
        
        switch ($action){
                case 1:
                    
                    $content=$_POST["Ncontent"];
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
    <fieldset>
        <legend>Liste des articles</legend>
        <?php
        include "connexion.php";
    $sql="SELECT * FROM `article` ORDER BY `id` DESC";
    echo("<table id=\"affichearticle\">
    <tr>
    <th>id</th><th>titre</th><th>date du post</th>
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
    <div class="retour-page">
        <p>Acceder à la page actualité</p>
        <a href="../actualites.php">page actualité</a>
    </div>
    <?php
            
        }else{
            echo('<p class="cache">Merci de vous connecter</p>
            <p class="cache">Pour vous authentifier <a href="../login.php" class="cache">cliquez ici</a></p><br>');
        }}
    
        ?>
</body>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
