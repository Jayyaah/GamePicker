<!DOCTYPE html>
<html>
<head>
    <title>GamePicker - Accueil</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Barre de navigation -->
<?php include 'navbar.php'; ?>

<!-- Contenu principal -->
<div class="container text-center mt-5 text-white">
    <h1 class="display-4 fw-bold">🎲 Bienvenue sur GamePicker !</h1>
    <p class="lead mt-3">
        Tu hésites sur quel jeu lancer ce soir ?<br>
        <strong>GamePicker</strong> est là pour t’aider à choisir au hasard un jeu selon ta plateforme.
    </p>

    <div class="mt-4">
        <a href="choix.php" class="btn btn-primary btn-lg m-2 shadow">🎮 Lancer un tirage</a>
        <a href="ajout.php" class="btn btn-success btn-lg m-2 shadow">➕ Ajouter un jeu</a>
    </div>

    <!-- Logo -->
    <img src="/img/gamepicker-logo.png" alt="Logo GamePicker" class="img-fluid mt-5" style="max-height: 200px;">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
