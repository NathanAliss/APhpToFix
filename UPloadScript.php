<?php

/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=bddraynald;host=localhost';
$user = 'root';
$password = 'root';

try {
    $bdd= new PDO($dsn, $user, $password);
    echo "<br><hr><br>accès bdd ok<br><hr><br>";
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

//prepare de la requette


// Constantes
define("TARGET", "test/");    // Repertoire cible
define('MAX_SIZE',100000000);    // Taille max en octets du fichier
define('WIDTH_MAX',18000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX',10000);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = '';
$message = '';
$nomImage = '';
$checkUp = FALSE;
$imgSize='';
$req=$bdd->prepare("INSERT INTO article('id', 'titre', 'dPost', 'content', 'img_name', 'img_size','commentaire')VALUES (NULL,:titre,:dPost,:content,:imgN,:imgS,:commentaire)");
$tab='';

/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if(!is_dir(TARGET)){
  if(!mkdir(TARGET, 0777) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !'.TARGET );
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['fichier']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;
 
            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
            {
              $message = 'Upload réussi !';
                //check si sa va bien
                $checkUp = TRUE;
            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problème lors de l\'upload !';
            }
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Erreur dans les dimensions de l\'image !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'Le fichier à uploader n\'est pas une image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
  }
   //check un peu bourin de si les autre champ son plein
    if(!empty($_POST["titre"]&&$_POST["dPost"]&&$_POST["text"]&&$_POST["comm"])&&$checkUp==TRUE){
       $imgSize=filesize($_FILES['fichier']['tmp_name']);
        
        //on met dans un tab pour execute
        $tab= array("titre"=>$_POST["titre"],"dPost"=>$_POST["dPost"],"content"=>$_POST["text"],"imgN"=>$nomImage,"imgS"=>$imgSize,"commentaire"=>$_POST["comm"]); 
       
        //on execute le bazar
        
       $req->execute($tab);
        echo ("req donnetest");
    }else{
        echo ("les contenue texte ne sont pas remplie");
    }
}

//controle sa BOUGE a la fin

echo ("<br><hr><br>target : ".TARGET."<br> taille max :".MAX_SIZE."<br> max-width : ".WIDTH_MAX."<br> max-hight : ".HEIGHT_MAX."<br> extention : $extension <br> message : $message <br> nom : $nomImage<br> check : $checkUp <br><hr><br>");


//USELLESS
foreach ($tab as $key => $value){
    echo ("$key : $value <br>"); 
}



echo("<br><hr><br>");

var_dump($req);

echo("<br><hr><br>");
?>