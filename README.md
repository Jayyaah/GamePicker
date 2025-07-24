<h1 align="center">🎮 GamePicker</h1>

<p align="center">
  Une application PHP/MySQL pour tirer un jeu au hasard parmi votre collection 🕹️
</p>

<p align="center">
  <img src="https://img.shields.io/badge/docker-ready-blue?logo=docker" alt="Docker Ready" />
  <img src="https://img.shields.io/badge/php-7.4+-8892BF?logo=php" alt="PHP" />
  <img src="https://img.shields.io/badge/mysql-5.7-blue?logo=mysql" alt="MySQL" />
</p>

---

## 🚀 Lancer le projet avec Docker

Ce projet utilise Docker pour simplifier le déploiement local. Il inclut :

- Apache + PHP
- MySQL
- phpMyAdmin

### ✅ Prérequis

- Docker installé sur votre machine
- Docker Compose installé (inclus dans Docker Desktop)

### 📁 Structure recommandée

```

GamePicker/
├── docker-compose.yml
├── config.php
├── \*.php (vos fichiers de projet)
└── sql/
└── init.sql (script de création de la base)

````

### 📦 Démarrage

```bash
docker compose up -d
````

Cela va :

* Démarrer un conteneur web (`apache+php`)
* Démarrer une base de données MySQL
* Démarrer phpMyAdmin

### 🌐 Accès

* **Application** : [http://localhost:8080](http://localhost:8080)
* **phpMyAdmin** : [http://localhost:8081](http://localhost:8081)

  * **Utilisateur** : `root`
  * **Mot de passe** : *(laisser vide)*

---

### 🛑 Arrêter le projet

```bash
docker compose down
```

### 🔄 Réinitialiser la base de données

```bash
docker compose down -v
docker compose up -d
```

> ⚠️ Cette commande supprime les volumes Docker (donc les données MySQL)
> Si un fichier `sql/init.sql` est présent, il sera réexécuté pour créer la base.

---

### ✨ Fonctionnalités à venir

* Authentification sécurisée
* Interface plus moderne en Bootstrap
* Système de favoris

---

👩‍💻 Développé avec ❤️ par Valentine
