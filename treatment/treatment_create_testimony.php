<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once('/../connexionBD.php');

    // on teste la déclaration de nos variables
    if (isset($_POST['titre']) && isset($_POST['contenu'])) {
           // on affiche nos résultats
           echo 'Votre nom est '.$_POST['titre'].' et votre fonction est '.$_POST['contenu'];
           
           $titre = htmlentities($_POST["titre"]);
           $contenu = htmlentities($_POST["contenu"]);
    }
    
    $ajout_temoignage = ('INSERT INTO temoignage VALUES (2,"test","'.$titre.'","'.$contenu.'","08-09-2016")');
    echo $ajout_temoignage;
    $exec_temoig = $connexion->exec($ajout_temoignage);
 
 ?>