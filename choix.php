<!DOCTYPE html>
<html>
<head>
    <title>Jeu aléatoire</title>
    <meta charset="UTF-8" />
    <link href="pageaj.css" rel="stylesheet" type="text/css">
</head>
<body>

<nav>
    <ul>
        <li><a href="accueil.php">ACCUEIL</a></li>
        <li><a href="ajout.php">AJOUTER UN JEU</a></li>
        <li><a href="choix.php">JEU ALÉATOIRE</a></li>
        <li><a href="list.php">LISTE</a></li>
        <li><a href="inscription.php">CONNEXION</a></li>
    </ul>
</nav>

<h1>Choix de la plateforme</h1>

<div id="jeu">
    <fieldset>
        <form action="aleatoire.php" method="post">
            <input type="hidden" name="plateforme" value="Tout" />
            <input type="submit" value="Toutes plateformes" />
        </form>
        <form action="aleatoire.php" method="post">
            <input type="hidden" name="plateforme" value="PC" />
            <input type="submit" value="PC" />
        </form>
        <form action="aleatoire.php" method="post">
            <input type="hidden" name="plateforme" value="PS4" />
            <input type="submit" value="PS4" />
        </form>
        <form action="aleatoire.php" method="post">
            <input type="hidden" name="plateforme" value="SWITCH" />
            <input type="submit" value="SWITCH" />
        </form>
    </fieldset>
</div>

</body>
</html>
