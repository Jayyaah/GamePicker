<?php
session_start();
?>

<nav class="navbar navbar-dark">
    <div class="container justify-content-center">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link text-white" href="index.php">Accueil</a></li>
            
            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item"><a class="nav-link text-white" href="ajout.php">Ajouter un jeu</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="list.php">Liste</a></li>
            <?php endif; ?>
            
            <li class="nav-item"><a class="nav-link text-white" href="choix.php">Jeu Aléatoire</a></li>

            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <span class="nav-link text-white">👤 <?= htmlspecialchars($_SESSION['user']['pseudo']) ?></span>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="logout.php">Déconnexion</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link text-white" href="connexion.php">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
