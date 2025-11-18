# Commandes pour lancer le projet Laravel

## ✅ Déjà fait
- ✅ Composer installé
- ✅ Dépendances PHP installées (`composer install`)
- ✅ Fichier `.env` créé
- ✅ Clé d'application générée (`php artisan key:generate`)

## 1. Installation des dépendances PHP
```bash
composer install
```

## 2. Installation des dépendances Node.js
```bash
npm install
```

## 3. Configuration de l'environnement
Créez un fichier `.env` à partir de la configuration par défaut :
```bash
cp .env.example .env
```
*(Si le fichier .env.example n'existe pas, créez un fichier .env avec les variables nécessaires)*

## 4. Génération de la clé d'application
```bash
php artisan key:generate
```

## 5. Configuration de la base de données
Éditez le fichier `.env` et configurez votre base de données :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=votre_base_de_donnees
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

## 6. Exécution des migrations
```bash
php artisan migrate
```

## 7. (Optionnel) Remplir la base de données avec des données de test
```bash
php artisan db:seed
```

## 8. Compilation des assets frontend
Pour le développement (avec hot-reload) :
```bash
npm run dev
```

Pour la production :
```bash
npm run build
```

## 9. Lancer le serveur de développement
Dans un nouveau terminal :
```bash
php artisan serve
```

Le projet sera accessible sur : `http://localhost:8000`

---

## Commandes artisan disponibles dans ce projet

### Commandes personnalisées
- `php artisan daily:word` - Commande pour le mot du jour
- `php artisan weekly:word` - Commande pour le mot de la semaine
- `php artisan monthly:word` - Commande pour le mot du mois

### Commandes utiles
- `php artisan route:list` - Lister toutes les routes
- `php artisan cache:clear` - Vider le cache
- `php artisan config:clear` - Vider le cache de configuration
- `php artisan view:clear` - Vider le cache des vues

