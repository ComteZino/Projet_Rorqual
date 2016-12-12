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
    
    $tableuser="SELECT * FROM professionnel WHERE idEtud='".$idEtud."'";
    $table = $connexion->query($tableuser);
    $ligne = $table -> fetch();
    
    $nom=$ligne['nom'];
    $prenom=$ligne['prenom'];
    $idEtud=$ligne['idEtud'];
    
    $titre = htmlentities($_POST["titre"]);
    $contenu = htmlentities($_POST["contenu"]);
    $date = date("Y-m-d-");
    $idCursus = htmlentities($_POST["cursus"]);
    
    $selectIdTemoignage = $connexion->query('Select * from temoignage');
    $idTemoignage = 0;
    while($ligneid = $selectIdTemoignage->fetch()) // créé un nouvel id pour le compte de l'utilisateur/administrateur
    {
        $idTemoignage = $ligneid["idTemoignage"];
    }
    $idTemoignage = $idTemoignage + 1;


    
    $ajout_temoignage = ('INSERT INTO temoignage VALUES ("'.$idTemoignage.'","'.$nom." ".$prenom.'","'.$titre.'","'.$contenu.'","'.$date.'","'.$idEtud.'","'.$idCursus.'")');
    //echo $ajout_temoignage;
    $exec_temoig = $connexion->exec($ajout_temoignage);
    
    header("refresh:1;url=../testimony.php");
 
 ?>