<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();

    require_once('/../connexionBD.php');

    $idEtud = htmlentities($_POST["idEtud"]);
    
    $nom = htmlentities($_POST["nom"]);
    $prenom= htmlentities($_POST["prenom"]);
    $login = htmlentities($_POST["login"]);
    
    $formation = htmlentities($_POST["formation"]);
    $anneeFormation = htmlentities($_POST["anneeFormation"]);
    $entrepriseStage = htmlentities($_POST["entrepriseStage"]);
    $villeStage = htmlentities($_POST["villeStage"]);
    
    $libelle = htmlentities($_POST["libelle"]);
    $anneeEmbauche = htmlentities($_POST["anneeEmbauche"]);
    $entrepriseProfession = htmlentities($_POST["entrepriseProfession"]);
    $villeProfession = htmlentities($_POST["nom"]);
    
    $modif_professionnel = ('UPDATE professionnel SET nom="'.$nom.'", prenom="'.$prenom.'", login="'.$login.'" WHERE idEtud='.$idEtud);
    echo $modif_professionnel;
    $exec_professionnel = $connexion->exec($modif_professionnel);
    
    $modif_poursuiteetude = ('UPDATE poursuiteetude SET formation="'.$formation.'", anneeFormation="'.$anneeFormation.'", entreprise="'.$entrepriseStage.'", ville="'.$villeStage.'" WHERE idEtud='.$idEtud);
    echo $modif_poursuiteetude;
    $exec_poursuiteetude = $connexion->exec($modif_poursuiteetude);
    
    $modif_parcourspro = ('UPDATE parcourspro SET libelle="'.$libelle.'", anneeEmbauche="'.$anneeEmbauche.'", entreprise="'.$entrepriseProfession.'", ville="'.$villeProfession.'" WHERE idEtud='.$idEtud);
    echo $modif_parcourspro;
    $exec_parcourspro = $connexion->exec($modif_parcourspro);