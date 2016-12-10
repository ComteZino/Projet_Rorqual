<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();
    $_SESSION["page"] = "create-testimony";
   
    if($_SESSION["connect"] != 1)
    {
        header('Location: login.php ');
    }

    require_once('connexionBD.php');
    //On selectionne les données
    $cursus = ('SELECT idCursus,niveau FROM CURSUS ORDER BY idCursus ASC');
    $query_select = $connexion->query($cursus);
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
        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script><!-- Script pour l'outil d'édition de texte --> 
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
    
        if($_SESSION["connect"] != 1)
        {
        include 'nav-offline.php';
        }
        else{
        include 'nav-online.php';
        }
     ?>
    
    <div id="main">
        <div id="box_create_testimony"> 
            <h2>Création d'un témoignage</h2>
            <form action="treatment/treatment_create_testimony.php" method="post">
                <div id="titre">           
                    <h3 id="h3_testimony">Titre du témoignage</h3>   
                    <input name="titre" type="text" id="titre" />         
                </div>
                <div id="Catégorie">    
                    <h3 id="h3_testimony">Catégorie</h3>   
                    <select name="cursus" id="cursus">
                        <option value="">Selectionnez une formation</option>

                        <?php                  
                            //On affiche les catégories dans la liste
                            while($ligne = $query_select->fetch())
                            {

                                echo '<option value="'.$ligne['idCursus'].'">'.$ligne['niveau'].'</option>';
                            }	
                        ?>
                    </select>
                </div>
                <div id="contenue">
                    <h3 id="h3_testimony">Contenu du témoignage</h3>
                    <textarea name="contenu" rows="10" cols="50" >
                        <?php
                            if (!empty($_POST["contenu"]))
                            {
                                echo stripcslashes(htmlspecialchars($_POST["contenu"],ENT_QUOTES));
                            }
                        ?>
                    </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'contenu' );// Mise en place de l'outil d'édition de texte précédement appelé 
                    </script>           
                </div>
                <button id="button_testimony">Envoyer</button>
            </form>
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