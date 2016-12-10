<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    session_start();

    require_once('/../connexionBD.php');
    
    // on teste la déclaration de nos variables
    if (empty($_POST['Identifiant']) || empty($_POST['Identifiant'])){
        echo erreur;
    }
            
    $pseudo = htmlentities($_POST["Identifiant"]);
    $mdp = htmlentities($_POST["Password"]);

      
    $mdp=md5($mdp);
    $tableuser="SELECT * FROM professionnel WHERE login='".addslashes($pseudo)."' AND password='".addslashes($mdp)."'";
    $table = $connexion->query($tableuser);
    
    
    $ligne = $table -> fetch();
    
    $idEtud=$ligne['idEtud'];
    echo $idEtud;
    
    $_SESSION['$idEtud'] = $idEtud;
    echo $_SESSION['$idEtud'];
    
    if(!empty($ligne))
    {
        $_SESSION["connect"] = 1;
        header('Location: ../index.php ');
    }
    else
    {
        $_SESSION["connect"] = 0;
        header('Location: ../login.php');
    }
    
?>    