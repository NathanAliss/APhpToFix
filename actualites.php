<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="Page acutualité" content="One page : l'accueil, à propos de wooderhille, les acutalitées et la page contact">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="generator" content="brackets">
    <meta name="pinterest" content="nopin" description="Sorry, you can't save from my website!">


    <title>Raynald Derhille &mdash; Actualité </title>

    <!-- Meta Data // SEO -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Ronan Poder / Nathan Sanchez" />
    <meta name="copyright" content="Ronan Poder / Nathan Sanchez" />
    <meta name="publisher" content="Ronan Poder / Nathan Sanchez" />
    <meta name="url" content="https://wooderhille.com" />
    <meta name="identifier-url" content="https://wooderhille.com" />
    <meta name="category" content="site vitrine" />
    <meta name="description" content="Wooderhille vous propose une expérience inédite. Nos maisons en bois sont fabriquées à la main, facilement transportables et gardent tout le confort d’une maison traditionnelle. Osez Wooderhille, c’est pouvoir voyager où vous souhaitez !" />
    <meta name="keywords" content="wooderhille, tiny house, normandie, cleres, rouen, tiny home, menuiserie, wooderhille tiny, nature, wooderhille tiny house, tiny house normandie, tiny house rouen, wooderhille rouen, wooderhille cleres">

    <!-- Open Graph data // Social Medias -->
    <meta property="og:title" content="Wooderhille" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://wooderhille.com" />
    <meta property="og:locale" content="fr_FR" />
    <!--image s'affichant lors du partage sur les RS-->
    <meta property="og:image" content="content/images/profile_ronan.jpg" />
    <meta property="og:description" content="Wooderhille vous propose une expérience inédite. Nos maisons en bois sont fabriquées à la main, facilement transportables et gardent tout le confort d’une maison traditionnelle. Osez Wooderhille, c’est pouvoir voyager où vous souhaitez !" />
    <meta property="og:site_name" content="Wooderhille" />

    <link rel="stylesheet" href="style_2.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="content/script/script.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160272212-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-160272212-1');

    </script>

    <!--   animate-->
    <link rel="stylesheet" href="content/script/animate.css">
    <script src="content/script/wow.min.js"></script>
    <script>
        new WOW().init();

    </script>

</head>

<body>



    <div class="box-feuilles">
        <img src="content/images/feuilles/feuille_1.png" alt="fougère" class="feuille feuille-1">
        <img src="content/images/feuilles/feuille_2.png" alt="fougère" class="feuille feuille-2">
    </div>

    <div id="bg-black">

        <h1 class="big-titre">Actualités</h1>

        <span id="flow">
            <?php 

include "admin/connexion.php";
        
$sql="SELECT * FROM `article` ORDER BY `id` ASC";
$querr=$bdd->query($sql);
        
foreach ($querr as $row){
    $name=$row["titre"];
    $dPost=$row["dPost"];
    $content=$row["content"];
    $img=$row["imgN"];
    
    echo("<div class=\"actu-line\">
            <img src=\"admin/test/$img\">
            <div class=\"content\">
                <h2>$name</h2>
                <p>$dPost</p>
                <p>$content</p>
            </div>
        </div>");
};
        
?>
        </span>
        <footer>
            Tous droits réservés - <a href="credits.html">voir les crédits</a>
        </footer>

    </div>
</body>

</html>
