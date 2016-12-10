<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();
    $_SESSION["page"] = "profil";
   
    if($_SESSION["connect"] != 1)
    {
        header('Location: login.php ');
    }

    require_once('connexionBD.php');
    //On selectionne les données
    $cursus = ('SELECT idCursus,niveau FROM CURSUS ORDER BY idCursus ASC');
    $query_select = $connexion->query($cursus);
    
    $idEtud = $_SESSION['$idEtud'];   
    $information="SELECT nom, prenom FROM professionnel WHERE idEtud='".$idEtud."'";
    $table = $connexion->query($information);
    $ligne = $table -> fetch();
    
    $poursuiteEtude="SELECT * FROM poursuiteetude,professionnel WhERE professionnel.idEtud=poursuiteetude.professionnel_idEtud AND professionnel.idEtud='".$idEtud."'";
    $tablePoursuiteEtude = $connexion->query($poursuiteEtude);
    $lignePoursuiteEtude = $tablePoursuiteEtude -> fetch();
?>

<!DOCTYPE HTML>
<html>

<head>
        <title>Accueil</title>
        <meta charset="utf-8">
        <meta name="description" content="165c. uniques">
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/profil.css" />
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
        test
        <div id="box_profil">
            <div id="box_profil_top">
                <div id="profil_picture">
                </div>
                <div id="profil_information">
                    <?php   
                        echo "<p>".$ligne['prenom']."</p>"; 
                        echo "<p>".$ligne['nom']."</p>";  
                    ?>                   
                </div>  
            </div>
            <div id="box_profil_center">
                <div id="profil_etude">
                    <?php   
                        echo "<p>Formation : ".$lignePoursuiteEtude['formation']."</p>"; 
                        echo "<p>Année : ".$lignePoursuiteEtude['anneeFormation']."</p>";   
                        echo "<p>Établissement : ".$lignePoursuiteEtude['etablissement']."</p>"; 
                        echo "<p>Ville : ".$lignePoursuiteEtude['ville']."</p>"; 
                    ?>  
                    <div id="sous_profil_etude">
                        <h2>Dernier stage</h2>
                    </div>
                </div>
                
                <div id="profil_entreprise">
                </div>
            </div> 
            <div id="box_profil_bottom">
                <div id="profil_competence">
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