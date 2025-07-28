<!DOCTYPE html>
<html>
<head>
    <title>Jeu aléatoire</title>
    <meta charset="UTF-8" />
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
