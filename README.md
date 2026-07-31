# TechStock

TechStock est une application web de gestion de parc informatique développée avec **Laravel 12**. Elle permet de suivre les équipements (appareils), les salles dans lesquelles ils sont installés, leurs catégories, ainsi que l'historique de leurs interventions (maintenance, réparation, etc.).

## Fonctionnalités

- **Salles** (`rooms`) : gestion des salles avec nom, bâtiment et capacité.
- **Catégories** (`categories`) : classement des appareils par catégorie (relation many-to-many).
- **Appareils** (`devices`) : nom, marque, numéro de série (unique), état, date d'achat, description, rattachés à une salle et à une ou plusieurs catégories.
- **Interventions** (`interventions`) : historique des interventions effectuées sur un appareil (date, type, commentaire).

Chaque entité dispose des opérations CRUD complètes (création, consultation, modification, suppression) via des contrôleurs de ressources Laravel.

## Stack technique

- **Backend** : PHP 8.2+, Laravel 12
- **Frontend** : Blade, Tailwind CSS 4, Vite
- **Base de données** : SQLite par défaut (configurable via `.env`)

## Prérequis

- PHP >= 8.2
- Composer
- Node.js et npm
- Une base de données (SQLite par défaut, ou MySQL/PostgreSQL)

## Installation

```bash
git clone <url-du-repo>
cd techstock

# Installer les dépendances PHP
composer install

# Copier le fichier d'environnement et générer la clé d'application
cp .env.example .env
php artisan key:generate

# Créer la base de données SQLite (si utilisée)
touch database/database.sqlite

# Lancer les migrations
php artisan migrate

# Installer les dépendances front-end
npm install
```

## Lancer le projet en développement

```bash
composer run dev
```

Cette commande démarre en parallèle le serveur Laravel, la file d'attente (queue), les logs (Pail) et Vite.

Vous pouvez aussi lancer les services séparément :

```bash
php artisan serve      # serveur web
npm run dev            # build front-end (Vite)
```

L'application est ensuite accessible sur [http://localhost:8000](http://localhost:8000).

## Tests

```bash
composer test
```

## Structure des routes

| Ressource      | Route                                   |
|----------------|------------------------------------------|
| Appareils      | `/devices` (CRUD)                        |
| Salles         | `/rooms` (CRUD)                          |
| Catégories     | `/categories` (CRUD)                     |
| Interventions  | `POST /devices/{device}/interventions`   |

## Licence

Ce projet est un projet personnel basé sur le framework [Laravel](https://laravel.com), open-source sous licence [MIT](https://opensource.org/licenses/MIT).
