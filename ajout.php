<?php
require_once 'config.php';

if (isset($_POST['jeu'], $_POST['cat']) && !empty($_POST['jeu']) && !empty($_POST['cat'])) {
    $req = $pdo->prepare('INSERT INTO app (id, jeu, categorie) VALUES(NULL, :jeu, :categorie)');
    $req->bindValue(':jeu', $_POST['jeu'], PDO::PARAM_STR);
    $req->bindValue(':categorie', $_POST['cat'], PDO::PARAM_STR);
    $req->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout de jeu</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav>
    <ul>
        <li><a href="accueil.php">ACCUEIL</a></li>
        <li><a href="ajout.php">AJOUTER UN JEU</a></li>
        <li><a href="choix.php">JEU ALÉATOIRE</a></li>
        <li><a href="list.php">LISTE</a></li>
        <li><a href="#">CONNEXION</a></li>
    </ul>
</nav>

<div id="jeu">
    <form action="#" method="post">
        <fieldset>
            <legend>Ajouter un jeu</legend>
            <br />
            <label for="jeu">Entrer le nom d'un jeu :</label>
            <input type="text" name="jeu" id="jeu" required /><br /><br />

            <label for="cat">Plateforme :</label>
            <select name="cat" id="cat" required>
                <option value="">-- Choisir --</option>
                <option>PC</option>
                <option>PS4</option>
                <option>Switch</option>
            </select>
            <br /><br />
            <input type="submit" value="Envoyer" />
        </fieldset>
    </form>
</div>
</body>
</html>
