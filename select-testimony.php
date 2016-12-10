<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
    require_once('connexionBD.php');
    
    $idTemoignage = htmlentities($_GET["id"]);
    
    $actu="SELECT * FROM temoignage WHERE idTemoignage='$idTemoignage'";    
    $table = $connexion->query($actu);
    $ligne = $table->fetch();

?>

<!DOCTYPE HTML>
<html>

<head>
        <title>Accueil</title>
        <meta charset="utf-8">
        <meta name="description" content="165c. uniques">
        <link rel="stylesheet" href="assets/css/main.css" />
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
        <script src="assets/js/sticky.js" type="text/javascript"></script>
</head>

<body>
    <div class="header">
        <header>
            <span class="logo">
                <img src="assets/images/logo.png" alt>
            </span>
            <h1 id="h1_header">
                Rorqual 
            </h1>
            <p id="p_header">
                Un site de l'université de Pau et des Pays de l'Adour
            </p>
        </header>
    </div>  
    
    <?php
        session_start();
    
        if($_SESSION["connect"] != 1)
        {
        include 'nav-offline.php';
        }
        else{
        include 'nav-online.php';
        }
     ?>   

    <div id="main">
        <div id="box_select_testimony">
            <div id="child_select_testimony">
                <div class="titre">
                    <h1>
                        <?php
                            echo $ligne["titre"];
                        ?>
                    </h1>
                </div>
                <div class="categorie">
                    <p><span id="categorie">
                        <?php
                            $niveau="SELECT niveau FROM cursus WHERE  idCursus=".$ligne['cursus_idCursus']."";
                            $table2 = $connexion->query($niveau);
                            $ligne2 = $table2 -> fetch();
                            $niveau=$ligne2['niveau'];

                            echo "<p>Cursus : ".$niveau."</p>";
                            echo "</br>"
                        ?>
                        </span></p>

                </div>
                <div class="contenu">
                    <?php
                        echo htmlspecialchars_decode(strip_tags($ligne["contenu"]));
                    ?>
                </div>

                <div class="auteur_date">
                    </br>
                    <p>Témoignage posté par <span id="auteur"><?php echo $ligne["auteur"]; ?></span> le <span id="date"><?php echo $ligne["date"];?></span></p>
                </div>
            </div> 
        </div>    
    </div>        

    <aside><!-- Les à-cotés de la page --></aside>
    <article></article>
    <footer>
        <div id="footer">
            <div id="footer_left">
                <h2>
                    Aliquam sed mauris
                </h2>
                <p id="p_footer">
                    Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.
                </p>
                <div id="box_button_footer">
                    <button id="button_footer">Plus d'info</button>
                </div>
            </div>   

            <div id="footer_right">
                <h2>Contact</h2>
                <dl class="alt">
                    <dt>Adresse</dt> 
                    <dd>Avenue de l'Université • 64012 • Pau</dd>
                    <dt>Téléphone</dt>
                    <dd>05 59 40 70 00</dd>
                    <dt>Email</dt>
                    <dd>contact@uppa.fr</dd>                       
                </dl>

            </div> 

        </div>

    </footer>   
</body>
</html>

