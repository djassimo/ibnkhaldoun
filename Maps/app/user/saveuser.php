<!DOCTYPE html>
<html lang="en">
<head>

    <title>Document</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
</head>
<body>
<br>
    <div class="container">
        <form method="post" action="addUser.php">
            <input type="text" name="nom" placeholder=" Votre Nom" required><br><br>
            <input type="text" name="prenom" placeholder=" Votre Prénom" required><br><br>
            <input type="text" name="profession" placeholder=" Votre Profession" required><br><br>
            <input type="email" name="emailuser" placeholder="Votre Email" required><br><br>
            <input type="password" name="password" placeholder="Votre Mot de passe" required><br><br>


            <input type="submit" name="enregistrer" value="Inscrire">

        </form>
    </div>


</body>
</html>