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


<h1>Choix de la platforme</h1>

<div id = "jeu">
    <fieldset>
    <form action = "aleatoire.php" method = "post">
            <input type = "submit" name="Tout" value = "Toutes platformes" />
    </form>
    <form action = "aleatoirePC.php" method = "post">
            <input type = "submit" name="PC" value = "PC" />
    </form>
    <form action = "aleatoirePS4.php" method = "post">
            <input type = "submit" name="PS4" value = "PS4" />
    </form>
    <form action = "aleatoireSWITCH.php" method = "post">
            <input type = "submit" name="SWITCH" value = "SWITCH" />
    </form>
    </fieldset>
</div>

</body>
</html>