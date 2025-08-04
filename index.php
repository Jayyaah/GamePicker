<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GamePicker - Accueil</title>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Barre de navigation -->
<?php include 'navbar.php'; ?>

<!-- Contenu principal -->
<div class="container text-center mt-5 text-white">
    <h1 class="display-4 fw-bold">🎲 Bienvenue sur GamePicker !</h1>

    <p class="lead mt-3">
        Tu as une pile de jeux mais tu ne sais jamais quoi lancer ? <br>
        <strong>GamePicker</strong> choisit pour toi, selon ta plateforme, aléatoirement. Simple, rapide, efficace.
    </p>

    <div class="mt-4">
        <?php if (isset($_SESSION['user'])): ?>
            <a href="choix.php" class="btn btn-primary btn-lg m-2 shadow">🎮 Lancer un tirage</a>
            <a href="ajout.php" class="btn btn-success btn-lg m-2 shadow">➕ Ajouter un jeu</a>
        <?php else: ?>
            <p class="lead mt-3 fw-bold text-warning">
                Connecte-toi ou crée un compte pour commencer à piocher parmi tes jeux !
            </p>
            <a href="connexion.php" class="btn btn-outline-light btn-lg m-2">🔑 Connexion</a>
            <a href="inscription.php" class="btn btn-outline-info btn-lg m-2">📝 Inscription</a>
        <?php endif; ?>
    </div>

    <!-- Logo -->
    <img src="/img/gamepicker-logo.png" alt="Logo GamePicker" class="img-fluid mt-5" style="max-height: 200px;">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
