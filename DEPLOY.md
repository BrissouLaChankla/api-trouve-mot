# Guide de déploiement en production

## Étapes de déploiement

### 1. Se connecter au serveur en SSH
```bash
ssh user@votre-serveur.com
cd /chemin/vers/votre/projet
```

### 2. Récupérer les dernières modifications
```bash
git pull origin main
# ou
git pull origin master
```

### 3. Installer/actualiser les dépendances Composer
```bash
composer install --no-dev --optimize-autoloader
```

### 4. Installer/actualiser les dépendances NPM (si nécessaire)
```bash
npm install
npm run build
```

### 5. Vider les caches Laravel
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 6. Optimiser pour la production (optionnel mais recommandé)
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Vérifier les permissions (si nécessaire)
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 8. Redémarrer les services (si vous utilisez PHP-FPM)
```bash
sudo service php8.1-fpm restart
# ou la version de PHP que vous utilisez
```

## Points importants

### Fichier .env
Assurez-vous que votre `.env` en production contient :
```env
APP_URL=https://trouve-mot.fr
APP_ENV=production
APP_DEBUG=false
BEATRICE_API_KEY=35e6fafc-82b3-421a-9e74-57d21a92450c
```

### Vérifications après déploiement
- ✅ Tester la page `/blog`
- ✅ Tester une page d'article individuel
- ✅ Vérifier que le sitemap fonctionne : `https://trouve-mot.fr/sitemap.xml`
- ✅ Vérifier que les images s'affichent correctement

## Script de déploiement rapide

Vous pouvez créer un script `deploy.sh` sur votre serveur :

```bash
#!/bin/bash
cd /chemin/vers/votre/projet
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Puis l'exécuter avec : `bash deploy.sh`

