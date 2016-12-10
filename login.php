<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
session_destroy();
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta name="description" content="165c. uniques">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
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

    <div id="main">
        <h2 id="h2_login">Zone de connexion</h2>
        <div class="login-page">
            <div class="form">
              <form class="login-form" action="treatment/treatment_login.php" method="post" >           
                <input type="text" name="Identifiant" placeholder="Nom d'utilisateur"/>
                <input type="password" name="Password" placeholder="Mot de passe"/>
                <button>Connexion</button>
                <p class="message">Pas encore de compte ? <a href="sign-up.php">Créer un compte</a></p>
              </form>
            </div>
        </div>

    </div>        

    <nav><!-- Nav. principale de la page -> site --></nav> 
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
                <div id="button_footer">
                    <button>Plus d'info</button>
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

