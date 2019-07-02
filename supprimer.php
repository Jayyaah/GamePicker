<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=queljeujouer;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->prepare('DELETE FROM app WHERE id=:num LIMIT 1');
$reponse->bindValue(':num', $_GET['numJeu'], PDO::PARAM_INT);
$executeOk = $reponse->execute();

if ($executeOk){
    $message = 'Le jeu à été supprimé';
} else {
    $message = 'Echec de la suppression du jeu';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Suppression</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="pageaj.css" rel="stylesheet" type="text/css">
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
            <a href="aleatoirePC.php">JEU ALEATOIRE</a>
        </li>
        <li>
            <a href="list.php">LISTE</a>
        </li>
        <li>
            <a href="inscription.php">CONNEXION</a>
        </li>
    </ul>
</nav>

<h1>Suppression</h1>
<p><?= $message ?></p>
<a href="list.php">Retour</a>
</body>
</html>
