<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="165c. uniques">
        <link rel="stylesheet" href="assets/css/main.css" />
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
        <script src="assets/js/sticky.js" type="text/javascript"></script>
    </head>
    <body>
            <nav>
        <div class="nav">
            <ul>    
                 <?php
                    if($_SESSION["page"] == "index"){
                        echo "<li><a href='index.php' class='active'>Accueil</a></li>";
                    }
                    else{
                        echo "<li><a href='index.php'>Accueil</a></li>";
                    }                 
                    if($_SESSION["page"] == "testimony")
                    {
                         echo "<li><a href='testimony.php' class='active'>Consultation</a></li>";
                    }
                    else{
                        echo "<li><a href='testimony.php'>Consultation</a></li>";
                    }
                    if($_SESSION["page"] == "create-testimony")
                    {
                         echo "<li><a href='create-testimony.php' class='active'>Création</a></li>";
                    }
                    else{
                        echo "<li><a href='create-testimony.php'>Création</a></li>";
                    }
                    if($_SESSION["page"] == "profil")
                    {
                         echo "<li><a href='profil.php' class='active'>Profil</a></li>";
                    }
                    else{
                        echo "<li><a href='profil.php'>Profil</a></li>";
                    }
                    ?>
                    <li><a href='login.php'>Deconnexion</a></li>                
                
            </ul>    
        </div>
    </nav> 
    </body>
</html>
