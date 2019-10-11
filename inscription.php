<!DOCTYPE html>
<html>
<head>
    <title>Jeu aléatoire</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="pageaj.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav>
    <ul>
        <li>
            <a href="accueil.php">ACCUEIL</a>
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
            <a href="inscription.php">CONNEXION</a>
        </li>
    </ul>
</nav>
<h1>Inscription</h1>

	<form method="post" action="inscription.php">
		<label>Pseudo: <input type="text" name="pseudo"/></label><br/>
		<label>Mot de passe: <input type="password" name="passe"/></label><br/>
		<label>Confirmation du mot de passe: <input type="password" name="passe2"/></label><br/>
		<label>Adresse e-mail: <input type="text" name="email"/></label><br/>
		<input type="submit" value="M'inscrire"/>
	</form>

<?php
if(!empty($_POST['pseudo']))
{
// D'abord, je me connecte à la base de données.
try
{
$bdd = new PDO('mysql:host=localhost;dbname=queljeujouer;charset=utf8','root','');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

// Je mets aussi certaines sécurités ici…
$passe = mysql_real_escape_string(htmlspecialchars($_POST['passe']));
$passe2 = mysql_real_escape_string(htmlspecialchars($_POST['passe2']));
if($passe == $passe2)
{
$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
// Je vais crypter le mot de passe.
$passe = sha1($passe);

mysql_query("INSERT INTO validation VALUES('', '$pseudo', '$passe', '$email')");
}
 
else
{
echo 'Les deux mots de passe que vous avez rentrés ne correspondent pas…';
}
}
?>




</body>
</html>