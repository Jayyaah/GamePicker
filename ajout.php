<?php

$bdd = new PDO('mysql:host=localhost;dbname=queljeujouer', 'root', '');

$req = $bdd->prepare('INSERT INTO app VALUES(NULL, :jeu, :categorie)');

if (isset($_POST['jeu'], $_POST['cat'])){
    $req->bindValue(':jeu',$_POST['jeu'],PDO::PARAM_STR);
    $req->bindValue(':categorie', $_POST['cat'], PDO::PARAM_STR);
    $req->execute();
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ajout de jeu</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

<body>
<nav>
    <ul>
        <li>
            <a href="#">ACCUEIL</a>
        </li>
        <li>
            <a href="ajout.php">AJOUTER UN JEU</a>
        </li>
        <li>
            <a href="choix.php">JEU ALEATOIRE</a>
        </li>
        <li>
            <a href="list.php">LISTE</a>
        </li>
        <li>
            <a href="#">CONNEXION</a>
        </li>
    </ul>
</nav>
	<div id = "jeu">
   		<form action = "#" method = "post">
    		<fieldset>
    			<legend>Ajouter un jeu</legend>
    			<br />
    			<label for = "jeu">Entrer le nom d'un jeu :</label>
    			<input type = "text" name = "jeu" id = "jeu" /><br /><br />
                <label for = "cat">Platforme :</label>
                <select name="cat" size="1">
                    <option>PC</option>
                    <option>PS4</option>
                    <option>Switch</option>
                </select>
    			<input type = "submit" value = "Envoyer" />
			</fieldset>
    	</form>
	</div>
</body>
</html> 
