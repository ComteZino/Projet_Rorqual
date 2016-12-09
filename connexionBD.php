<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

try
    {
        $dns ='mysql:host=localhost;dbname=rorqual';
        $utilisateur='root';
        $motdepasse='';
        $connexion = new PDO($dns,$utilisateur,$motdepasse);
        $connexion->query("SET NAMES utf8");
    }
    catch (Exception $e)
    {
        echo('connexion impossible');
        die();
    }
    
    
?>