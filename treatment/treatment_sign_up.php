<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once('/../connexionBD.php');

    
    $prenom = htmlentities($_POST["Prenom"]);
    $nom = htmlentities($_POST["Nom"]);
    $pseudo = htmlentities($_POST["Identifiant"]);
    $mdp = htmlentities($_POST["Password"]);
    $mdp=md5($mdp);
    $idCursus = htmlentities($_POST["cursus"]);
    
    $selectIdCompte = $connexion->query('Select * from professionnel');
    $idCompte = 0;
    while($ligneid = $selectIdCompte->fetch()) // créé un nouvel id pour le compte de l'utilisateur/administrateur
    {
        $idCompte = $ligneid["idEtud"];
    }
    $idCompte = $idCompte + 1;
  
    
    $ajout_compte = ('INSERT INTO professionnel VALUES ("'.$nom.'","'.$prenom.'","'.$pseudo.'","'.$mdp.'","'.$idCompte.'","'.$idCursus.'")');
    //echo $ajout_compte;
    $exec_compte = $connexion->exec($ajout_compte);
    
    header("refresh:1;url=../sign-up-complement.php");
 
 ?>