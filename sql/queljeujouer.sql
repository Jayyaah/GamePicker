-- Suppression si déjà existantes (sécurité)
DROP TABLE IF EXISTS app;
DROP TABLE IF EXISTS validation;

-- Table des utilisateurs
CREATE TABLE validation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL UNIQUE,
    motdepasse VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table des jeux, liés à un utilisateur
CREATE TABLE app (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jeu VARCHAR(255) NOT NULL,
    categorie VARCHAR(50) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES validation(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
