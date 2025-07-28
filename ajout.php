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
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark" style="background: #393939;">
    <div class="container justify-content-center">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link text-white" href="index.php">Accueil</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="ajout.php">Ajouter un jeu</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="choix.php">Jeu Aléatoire</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="list.php">Liste</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="inscription.php">Connexion</a></li>
        </ul>
    </div>
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
