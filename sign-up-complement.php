<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Inscription complément</title>
    <meta charset="utf-8">
    <meta name="description" content="165c. uniques">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
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
        
        $_SESSION["page"] = "inscription";
    
        if($_SESSION["connect"] != 1)
        {
        include 'nav-offline.php';
        }
        else{
        include 'nav-online.php';
        }
     ?>     
        
        <div id="main">
            <h2 id="h2_login">Information supplémentaire</h2>
            <div class="login-page">
                <div class="form_sign_up_comp">
                    <form class="login-form" action="treatment/treatment_sign_up_complement.php" method="post">
                        <h3>Dernier stage effectué*</h3>
                        <input type="text" name="anneeFormation" placeholder="Année de formation"  required/>
                        <input type="text" name="entrepriseStage" placeholder="entreprise"  required/>
                        <input type="text" name="villeStage" placeholder="Ville"  required/>
                        <h3>Profession</h3>
                        <input type="text" name="libelle" placeholder="Libellé"/>
                        <input type="text" name="anneeEmbauche" placeholder="Année d'embauche"/>
                        <input type="text" name="entrepriseProfession" placeholder="entreprise"/>
                        <input type="text" name="villeProfession" placeholder="Ville"/>
                        <button>Valider</button>
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

