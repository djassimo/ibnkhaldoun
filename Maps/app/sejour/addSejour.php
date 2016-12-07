<?php

require_once "../db.php";

if(isset($_POST['ajouter'])){

	if ((isset($_POST['dateDebut']) && !empty($_POST['dateDebut'])) &&
		(isset($_POST['dateFin']) && !empty($_POST['dateFin'])) &&
		(isset($_POST['ville']) && !empty($_POST['ville'])) 
	 ) {
		
	 	  $req =$bdd->prepare("INSERT INTO datesejour (dateDebut,dateFin, Localisationid) VALUES (?,?,?)");
          $req->execute(array($_POST['dateDebut'], $_POST['dateFin'], $_POST['ville']));
            
       
           header ('Location: ../events/deplacementView.php');
            exit();

	}
}
