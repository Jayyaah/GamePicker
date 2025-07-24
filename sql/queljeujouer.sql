-- Suppression si déjà existant (optionnel mais recommandé)
DROP TABLE IF EXISTS app;
DROP TABLE IF EXISTS validation;

-- Création de la table des jeux
CREATE TABLE app (
                     id INT AUTO_INCREMENT PRIMARY KEY,
                     jeu VARCHAR(255) NOT NULL,
                     categorie VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Création de la table des utilisateurs
CREATE TABLE validation (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            pseudo VARCHAR(50) NOT NULL UNIQUE,
                            motdepasse VARCHAR(255) NOT NULL,
                            email VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
