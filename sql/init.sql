-- Suppression des tables existantes si besoin
DROP TABLE IF EXISTS app;
DROP TABLE IF EXISTS validation;

-- Table des utilisateurs
CREATE TABLE validation (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            pseudo VARCHAR(50) NOT NULL UNIQUE,
                            motdepasse VARCHAR(255) NOT NULL,
                            email VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table des jeux
CREATE TABLE app (
                     id INT AUTO_INCREMENT PRIMARY KEY,
                     jeu VARCHAR(255) NOT NULL,
                     categorie VARCHAR(50) NOT NULL,
                     user_id INT NOT NULL,
                     FOREIGN KEY (user_id) REFERENCES validation(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insertion d'un utilisateur de test
INSERT INTO validation (pseudo, motdepasse, email) VALUES
    ('valentine', '$2y$10$6cBdEtAAgAjT93zWTVuMSObeJvIQZ49gjTUt9aYauC0pAvTf3B1Ma', 'valentine@example.com');

-- Insertion de jeux pour l'utilisateur créé
-- On récupère son ID via une variable temporaire
SET @userId = (SELECT id FROM validation WHERE pseudo = 'valentine');

INSERT INTO app (jeu, categorie, user_id) VALUES
                                              ('The Witcher 3', 'PC', @userId),
                                              ('God of War', 'PS4', @userId),
                                              ('Zelda: Breath of the Wild', 'Switch', @userId),
                                              ('Stardew Valley', 'PC', @userId),
                                              ('Spider-Man', 'PS4', @userId);
