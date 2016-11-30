<?php

require_once "../db.php";

if(isset($_POST['envoyer'])){
	if ((isset($_POST['depart']) && !empty($_POST['depart'])) &&
		(isset($_POST['destination']) && !empty($_POST['destination'])) &&
		(isset($_POST['date']) && !empty($_POST['date'])) 
	 ) {
            
            $req =$bdd->prepare("INSERT INTO deplacement (depart,destination, date) VALUES (?,?,?)");
            $req->execute(array($_POST['depart'], $_POST['destination'], $_POST['date']));
            
       
            header ('Location: deplacementView.php?date='.$_POST['date']);
            exit();
	}
}
