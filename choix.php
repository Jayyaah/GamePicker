<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php?message=" . urlencode("⚠️ Vous devez être connecté pour accéder à cette page."));
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jeu aléatoire</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<h1>Choix de la plateforme</h1>

<div class="card-plateforme">
    <form action="aleatoire.php" method="post">
        <input type="hidden" name="plateforme" value="Tout" />
        <input type="submit" value="🎮 Toutes plateformes" />
    </form>
    <form action="aleatoire.php" method="post">
        <input type="hidden" name="plateforme" value="PC" />
        <input type="submit" value="💻 PC" />
    </form>
    <form action="aleatoire.php" method="post">
        <input type="hidden" name="plateforme" value="PS4" />
        <input type="submit" value="🎮 PS4" />
    </form>
    <form action="aleatoire.php" method="post">
        <input type="hidden" name="plateforme" value="SWITCH" />
        <input type="submit" value="🎮 SWITCH" />
    </form>
</div>
</body>
</html>
