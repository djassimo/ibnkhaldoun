<?php

require_once "../db.php";

if(isset($_POST['envoyer'])){
	if ((isset($_POST['nomVille']) && !empty($_POST['nomVille'])) &&
		(isset($_POST['lat']) && !empty($_POST['lat'])) &&
		(isset($_POST['lng']) && !empty($_POST['lng'])) 
	 ) {
            
            $req =$bdd->prepare("INSERT INTO localisation (latitude, longitude,city) VALUES (?,?,?)");
            $req->execute(array( $_POST['lat'], $_POST['lng'], $_POST['nomVille']));
            
       
            header ('Location: localView.php');
            exit();
	}
}


