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
    $information="SELECT * FROM professionnel WHERE idEtud='".$idEtud."'";
    $table = $connexion->query($information);
    $ligne = $table -> fetch();
    
    $parcourspro="SELECT * FROM parcourspro,professionnel WHERE professionnel.idEtud=parcourspro.idEtud AND professionnel.idEtud='".$idEtud."'";
    $tableParcourspro = $connexion->query($parcourspro);
    $ligneParcourspro = $tableParcourspro -> fetch();
    
    $poursuiteEtude="SELECT * FROM poursuiteetude,professionnel WHERE professionnel.idEtud=poursuiteetude.idEtud AND professionnel.idEtud='".$idEtud."'";
    $tablePoursuiteEtude = $connexion->query($poursuiteEtude);
    $lignePoursuiteEtude = $tablePoursuiteEtude -> fetch();
    
    $testimony="SELECT * FROM temoignage,professionnel WhERE professionnel.idEtud=temoignage.idEtud AND professionnel.idEtud='".$idEtud."'";
    $tableTestimony = $connexion->query($testimony);
    $ligneTestimony = $tableTestimony -> fetch();
    
    $competence="SELECT *
    FROM professionnel
        JOIN posseder
            ON professionnel.idEtud=posseder.idEtud
                JOIN competence
                    ON posseder.idCompetence=competence.idCompetence
    WHERE professionnel.idEtud='".$idEtud."'";
    $tableCompetence = $connexion->query($competence);
    
    
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
        <div id="box_profil">
            <div id="box_profil_complement">
                <h1>Modification du profil</h1>
                <form method="post" action="treatment/treatment_modif_profil.php">  
                    <?php
                        echo '<input type="hidden" name="idEtud" value="'.$idEtud.'">';
                        
                        echo '<h2>Information</h2>';
                        echo '<p>Nom</p>';
                        echo '<input name="nom" value = "' . $ligne["nom"] . '" >';
                        echo '<p>Prenom</p>';
                        echo '<input name="prenom" value = "' . $ligne["prenom"] . '" >';
                        echo '<p>Login</p>';
                        echo '<input name="login" value = "' . $ligne["login"] . '" >';
                        

                        echo '<h2>Dernier stage</h2>';
                        echo '<p>Formation</p>';
                        echo '<input name="formation" value = "' . $lignePoursuiteEtude["formation"] . '" >';
                        echo '<p>Année de formation</p>';
                        echo '<input name="anneeFormation" value = "' . $lignePoursuiteEtude["anneeFormation"] . '" >';
                        echo '<p>Entreprise</p>';
                        echo '<input name="entrepriseStage" value = "' . $lignePoursuiteEtude["entreprise"] . '" >';
                        echo '<p>Ville</p>';
                        echo '<input name="villeStage" value = "' . $lignePoursuiteEtude["ville"] . '" >';

                        echo'<h2>Profession</h2>';
                        echo '<p>Libellé</p>';
                        echo '<input name="libelle" value = "' . $ligneParcourspro["libelle"] . '" >';
                        echo '<p>Année d embauche</p>';
                        echo '<input name="anneeEmbauche" value = "' . $ligneParcourspro["anneeEmbauche"] . '" >';
                        echo '<p>Entreprise</p>';
                        echo '<input name="entrepriseProfession" value = "' . $ligneParcourspro["entreprise"] . '" >';
                        echo '<p>Ville</p>';
                        echo '<input name="villeProfession" value = "' . $ligneParcourspro["ville"] . '" >';
                     ?>
                    <button id="button_profil">modifier</button>
                </form>
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