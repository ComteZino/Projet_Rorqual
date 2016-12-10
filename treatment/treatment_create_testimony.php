<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    /*session_start();

    if($_SESSION["connect"] != 1)
    {
        header('Location: login.php ');
    }*/

    require_once('/../connexionBD.php');

    // on teste la déclaration de nos variables
    
    $idEtud = $_SESSION['idEtud'];
    //echo $idEtud;
    $select_auteur = $connexion->query('Select login from professionnel where idEtud='.$idEtud.';');
    $auteur = $select_auteur->fetch();
    $auteur = $auteur["login"];
    
   
    $titre = htmlentities($_POST["titre"]);
    $contenu = htmlentities($_POST["contenu"]);
    $date = date("Y-m-d-");
    $idCursus = htmlentities($_POST["cursus"]);


    
    $ajout_temoignage = ('INSERT INTO temoignage VALUES (2,"test","'.$titre.'","'.$contenu.'","'.$date.'","'.$idCursus.'")');
    //echo $ajout_temoignage;
    $exec_temoig = $connexion->exec($ajout_temoignage);
 
 ?>