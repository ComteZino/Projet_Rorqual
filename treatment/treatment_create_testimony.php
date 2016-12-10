<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();

    if($_SESSION["connect"] != 1)
    {
        header('Location: login.php ');
    }

    require_once('/../connexionBD.php');

    $idEtud = $_SESSION['$idEtud'];
    
    $tableuser="SELECT nom, prenom FROM professionnel WHERE idEtud='".$idEtud."'";
    $table = $connexion->query($tableuser);
    $ligne = $table -> fetch();
    
    $nom=$ligne['nom'];
    $prenom=$ligne['prenom'];
    
    $titre = htmlentities($_POST["titre"]);
    $contenu = htmlentities($_POST["contenu"]);
    $date = date("Y-m-d-");
    $idCursus = htmlentities($_POST["cursus"]);


    
    $ajout_temoignage = ('INSERT INTO temoignage VALUES (3,"'.$nom.$prenom.'","'.$titre.'","'.$contenu.'","'.$date.'","'.$idCursus.'")');
    //echo $ajout_temoignage;
    $exec_temoig = $connexion->exec($ajout_temoignage);
 
 ?>