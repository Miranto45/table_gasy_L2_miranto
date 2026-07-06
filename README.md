# Resto Manager - Laravel 11

Application de gestion de restaurant (tables, zones, clients, réservations)
construite avec **Laravel 11** et **SQLite**.

## Prérequis

- PHP 8.2 ou plus
- Composer 2.x
- (optionnel) une extension VSCode PHP

## Installation

```bash
# 1. Installer les dépendances
composer install

# 2. Copier le fichier d'environnement
cp .env.example .env

# 3. Générer la clé applicative
php artisan key:generate

# 4. Créer la base SQLite (si elle n'existe pas)
touch database/database.sqlite

# 5. Lancer les migrations + les données de démo
php artisan migrate:fresh --seed

# 6. Démarrer le serveur
php artisan serve
```

Ouvrez ensuite http://localhost:8000

## Fonctionnalités

- Plan visuel des tables (positions X/Y, statuts colorés)
- CRUD Zones, Tables, Clients, Réservations
- Filtres par zone et capacité
- Changement de statut avec historique automatique
- Statuts : libre, reservee, occupee, a_nettoyer, hors_service

## Structure Laravel classique

```
app/
  Http/Controllers/   # Controllers (Table, Zone, Client, Reservation)
  Models/             # Modèles Eloquent
database/
  migrations/         # Schéma
  seeders/            # Données de démo
resources/views/      # Templates Blade
routes/web.php        # Routes
```

## Commandes utiles

```bash
php artisan migrate:fresh --seed   # reset + seed
php artisan route:list             # voir toutes les routes
php artisan tinker                 # console interactive
```
