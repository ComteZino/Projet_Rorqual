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
        
        $_SESSION["page"] = "index";
    
        if($_SESSION["connect"] != 1)
        {
        include 'nav-offline.php';
        }
        else{
        include 'nav-online.php';
        }
     ?>    
    
    <div id="main">
        <div id="introduction">
            <div id="box_introduction">
                <div id="content_introduction">
                    <div id="header_introduction">
                        <h2>
                            Présentation
                        </h2>
                    </div>
                    <div id="barre_introduction">
                    </div>
                    <div id="description_introduction">
                        <p>
                            Sed lorem ipsum dolor sit amet nullam consequat feugiat consequat magna adipiscing magna etiam amet veroeros. Lorem ipsum dolor tempus sit cursus. Tempus nisl et nullam lorem ipsum dolor sit amet aliquam.
                        </p>
                    </div>
                    <button id="button_introduction">En savoir plus</button>
                </div>
                <div id="img_introduction">
                    <img src="assets/images/présentation.png" alt>
                </div>
            </div>
        </div>          


        <div id="fonction">
            <div id="box_fonction">
                <div id="content_fonction">
                    <div id="header_fonction">
                        <h2>
                            Fonctionnalités
                        </h2>
                    </div>

                    <div id="barre_fonction">
                    </div>

                    <div class="child">
                        <img src="assets/images/testimony.png" alt>
                        <h3>
                            <a href="create-testimony.php">Témoignage</a>
                        </h3>
                        <p>
                            Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.
                        </p>

                    </div>
                    <div class="child">
                        <img src="assets/images/graphic.png" alt>
                        <h3>
                            <a href="profil.php">Compétences</a>
                        </h3>
                        <p>
                            Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.
                        </p>

                    </div>
                    <div class="child">
                        <img src="assets/images/consultation.png" alt>
                        <h3>
                            <a href="testimony.php">Consultation</a>
                        </h3>
                        <p>
                            Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed consequat.
                        </p>

                    </div>


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

