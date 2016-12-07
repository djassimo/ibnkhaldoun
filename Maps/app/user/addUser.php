<?php

require_once "../db.php";

if(isset($_POST['enregistrer'])){


    if ((isset($_POST['nom']) && !empty($_POST['nom'])) &&
        (isset($_POST['prenom']) && !empty($_POST['prenom']))&&
        (isset($_POST['profession']) && !empty($_POST['profession']))&&
        (isset($_POST['emailuser']) && !empty($_POST['emailuser']))&&
        (isset($_POST['password']) && !empty($_POST['password']))
    )
    {
        echo 'rrrrrrrrrrr';

        $req =$bdd->prepare("INSERT INTO utilisateur (nom ,prenom, profession,email,password,role) VALUES (?,?,?,?,?,?)");
        $req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['profession'],$_POST['emailuser'],$_POST['password'],"ROLE_USER"));


       // header ('Location: saveuser.php?username='.$_POST['nom']);
        //exit();
    }
}