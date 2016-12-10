<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    session_start();
    require_once('/../connexionBD.php');

    //Récupération information stage
    $anneeFormation = htmlentities($_POST["anneeFormation"]);
    $entrepriseStage = htmlentities($_POST["entrepriseStage"]);
    $villeStage = htmlentities($_POST["villeStage"]);
  
    //Récupération informatio professions
    $libelle = htmlentities($_POST["libelle"]);
    $anneeEmbauche = htmlentities($_POST["anneeEmbauche"]);
    $entrepriseProfession = htmlentities($_POST["entrepriseProfession"]);
    $villeProfession = htmlentities($_POST["villeProfession"]);
    
    //Récupération de l'id de l'étudiant qui ajoute le compte
    $idEtud = $_SESSION["idCompte"];
    
    //Récupération du niveau du cursur (libele)
    $selectNiveauCursus = $connexion->query('Select * from professionnel, cursus where professionnel.idEtud=cursus.idCursus and idEtud="'.$idEtud.'"');
    $ligneNiveauCursus = $selectNiveauCursus->fetch();
    $NiveauEtud = $ligneNiveauCursus["niveau"];
    
    //Création d'un id de poursuite d'étude
    $selectIdPoursuiteEtude = $connexion->query('Select * from poursuiteetude');
    $idPoursuiteEtude = 0;
    while($ligneidPoursuiteEtude = $selectIdPoursuiteEtude->fetch()) // créé un nouvel id pour le compte de l'utilisateur/administrateur
    {
        $idPoursuiteEtude = $ligneidPoursuiteEtude["idPoursuiteEtude"];
    }
    $idPoursuiteEtude = $idPoursuiteEtude + 1;
    
    //Création d'un id de profession
    $selectIdParcourspro = $connexion->query('Select * from parcourspro');
    $idParcourspro = 0;
    while($ligneidParcourspro = $selectIdParcourspro->fetch()) // créé un nouvel id pour le compte de l'utilisateur/administrateur
    {
        $idParcourspro = $ligneidParcourspro["idParcoursPro"];
    }
    $idParcourspro = $idParcourspro + 1;
  
    //Ajout du stage
    $ajout_stage = ('INSERT INTO poursuiteetude VALUES ("'.$idPoursuiteEtude.'","'.$NiveauEtud.'","'.$anneeFormation.'","'.$entrepriseStage.'","'.$villeStage.'","'.$idEtud.'")');
    //echo ajout_stage;
    $exec_stage = $connexion->exec($ajout_stage);
    
    //Ajout de la profession
    $ajout_profession = ('INSERT INTO parcourspro VALUES ("'.$idParcourspro.'","'.$libelle.'","'.$anneeEmbauche.'","'.$entrepriseProfession.'","'.$villeProfession.'","'.$idEtud.'")');
    //echo ajout_profession;
    $exec_profession = $connexion->exec($ajout_profession);
    
 ?>