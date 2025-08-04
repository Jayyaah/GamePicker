<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php?message=" . urlencode("⚠️ Vous devez être connecté pour accéder à cette page."));
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Choix de la plateforme</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- Contenu de la page -->
<div class="container mt-5">
    <div class="card-plateforme">
        <h1 class="text-center text-white mb-4">Choix de la plateforme</h1>
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
</div>

</body>
</html>
