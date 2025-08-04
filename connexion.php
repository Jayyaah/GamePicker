<?php
session_start();
require_once 'config.php';

$message = "";

// Redirection si déjà connecté
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');
    $motdepasse = $_POST['motdepasse'] ?? '';

    if (!empty($pseudo) && !empty($motdepasse)) {
        $stmt = $pdo->prepare("SELECT * FROM validation WHERE pseudo = :pseudo");
        $stmt->execute([':pseudo' => $pseudo]);
        $user = $stmt->fetch();

        if ($user && password_verify($motdepasse, $user['motdepasse'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'pseudo' => $user['pseudo']
            ];
            header('Location: index.php');
            exit;
        } else {
            $message = "❌ Identifiants incorrects.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php include 'navbar.php'; ?>

<h1 class="titre-simple">Connexion</h1>

<div class="card-ajout" style="max-width: 500px; margin: 2rem auto;">
    <div class="card p-4">
        <form method="post" action="connexion.php">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo :</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div>
            <div class="mb-3">
                <label for="passe" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="passe" name="motdepasse" required>
            </div>
            <div class="text-center">
                <input type="submit" value="Se connecter" class="btn-purple">
            </div>
        </form>

        <?php if ($message): ?>
            <p class="mt-3 text-center" style="color: <?= str_starts_with($message, 'Connexion') ? '#00ff8c' : '#ff6b6b' ?>;">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
