<?php
require_once 'config.php';

$id = $_GET['numJeu'] ?? null;

if ($id && is_numeric($id)) {
    try {
        $stmt = $pdo->prepare('DELETE FROM app WHERE id = :num LIMIT 1');
        $stmt->bindValue(':num', $id, PDO::PARAM_INT);
        $executeOk = $stmt->execute();

        if ($executeOk && $stmt->rowCount() > 0) {
            // ✅ Jeu supprimé → on redirige vers list.php avec succès
            header("Location: list.php?supprime=$id&message=" . urlencode("🎯 Le jeu a bien été supprimé."));
            exit;
        } else {
            // ❌ Jeu non trouvé → on redirige avec message d’erreur
            header("Location: list.php?message=" . urlencode("❌ Échec de la suppression du jeu (id introuvable)."));
            exit;
        }
    } catch (PDOException $e) {
        header("Location: list.php?message=" . urlencode("💥 Erreur : " . $e->getMessage()));
        exit;
    }
} else {
    header("Location: list.php?message=" . urlencode("⚠️ ID invalide ou manquant."));
    exit;
}
