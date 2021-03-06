<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();

    require_once('connexionBD.php');
    //On selectionne les données
    $cursus = ('SELECT idCursus,niveau FROM CURSUS ORDER BY idCursus ASC');
    $query_select = $connexion->query($cursus);
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Inscription</title>
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
            <h2 id="h2_login">Zone d'inscription</h2>
            <div class="login-page">
                <div class="form_sign_up">
                    <form class="login-form" action="treatment/treatment_sign_up.php" method="post">
                        <input type="text" name="Prenom" placeholder="Prénom"  required/>
                        <input type="text" name="Nom" placeholder="Nom"  required/>
                        <input type="text" name="Identifiant" placeholder="Nom d'utilisateur" required/>
                        <input type="password" name="Password" placeholder="Mot de passe" required/>
                        <select name="cursus" id="cursus" required>
                            <option value="">Selectionnez une formation</option>
                                <?php                  
                                    //On affiche les catégories dans la liste
                                    while($ligne = $query_select->fetch())
                                    {

                                        echo '<option value="'.$ligne['idCursus'].'">'.$ligne['niveau'].'</option>';
                                    }	
                                ?>
                        </select>
                        <button>Créer</button>
                        <p class="message">Déja enregistré ? <a href="login.php">Connexion</a></p>
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

