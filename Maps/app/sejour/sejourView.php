<?php

require_once "../db.php";

$req = $bdd->query("SELECT * FROM localisation");


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Séjour </title>
</head>
<body>
	<form action="addSejour.php" method="post">
		<label>date Début : </label>
		<input type="date" name="dateDebut">
		<label>date Fin : </label>
		<input type="date" name="dateFin">
		<select name="ville" id="ville">
          <?php
            while($ville =  $req->fetch()){
               ?>     
             <option value="<?php echo $ville['id']; ?>"> <?php echo $ville['city']; ?></option>
              <?php } 

              $req->closeCursor();
               ?>
        </select>
        <button type="submit" name="ajouter">Ajouter</button> 
	</form>
</body>
</html>