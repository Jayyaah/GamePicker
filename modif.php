<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=queljeujouer;charset=utf8','root','');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->prepare('SELECT * FROM app WHERE id = :num)');
$reponse->bindValue(':num', $_GET['numJeu'], PDO::PARAM_INT);
$executeOk = $reponse->execute();

$jeu = $reponse->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un jeu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css">
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
            <a href="#">CONNEXION</a>
        </li>
    </ul>
</nav>
<div id = "jeu">
    <form action = "updateModif.php" method = "post">
        <fieldset>
            <legend>Modifier un jeu</legend>
            <br />
            <input type="hidden" name="numJeu" value="<?= $jeu['id']?>">
            <label for = "jeu">Entrer le nom d'un jeu :</label>
            <input type = "text" name = "jeu" id = "jeu" value="<?=$jeu['jeu'] ?>" /><br /><br />
            <label for = "categorie">Platforme :</label>
            <select name="categorie" size="1" value="<?=$jeu['categorie'] ?>">
                <option>PC</option>
                <option>PS4</option>
                <option>Switch</option>
            </select>
            <input type = "submit" value = "Mettre à jour" />
        </fieldset>
    </form>
</div>
</body>
</html>