<?php
require_once 'config.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = trim($_POST['pseudo'] ?? '');
    $passe = $_POST['passe'] ?? '';
    $passe2 = $_POST['passe2'] ?? '';
    $email = trim($_POST['email'] ?? '');

    if (empty($pseudo) || empty($passe) || empty($passe2) || empty($email)) {
        $message = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Adresse e-mail invalide.";
    } elseif ($passe !== $passe2) {
        $message = "Les deux mots de passe ne correspondent pas.";
    } else {
        try {
            $check = $pdo->prepare("SELECT COUNT(*) FROM validation WHERE pseudo = :pseudo OR email = :email");
            $check->execute([
                ':pseudo' => $pseudo,
                ':email' => $email
            ]);
            if ($check->fetchColumn() > 0) {
                $message = "Ce pseudo ou cet email est déjà utilisé.";
            } else {
                // ✅ On utilise password_hash pour un hash compatible avec password_verify()
                $passeHash = password_hash($passe, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("INSERT INTO validation (pseudo, motdepasse, email) VALUES (:pseudo, :passe, :email)");
                $stmt->execute([
                    ':pseudo' => $pseudo,
                    ':passe' => $passeHash,
                    ':email' => $email
                ]);

                $message = "Inscription réussie ✅";
            }
        } catch (PDOException $e) {
            $message = "Erreur BDD : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php include 'navbar.php'; ?>

<h1 class="titre-simple">Inscription</h1>

<div class="card-ajout" style="max-width: 500px; margin: 2rem auto;">
    <div class="card p-4">
        <form method="post" action="inscription.php">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo :</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required>
            </div>
            <div class="mb-3">
                <label for="passe" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="passe" name="passe" required>
            </div>
            <div class="mb-3">
                <label for="passe2" class="form-label">Confirmation du mot de passe :</label>
                <input type="password" class="form-control" id="passe2" name="passe2" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="text-center">
                <input type="submit" value="M'inscrire" class="btn-purple">
            </div>
        </form>

        <?php if ($message): ?>
            <p class="mt-3 text-center" style="color: <?= str_starts_with($message, 'Inscription') ? '#00ff8c' : '#ff6b6b' ?>;">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
