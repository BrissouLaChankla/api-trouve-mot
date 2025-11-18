# Configuration du Blog

## Configuration du token API

Pour que le blog fonctionne correctement, vous devez ajouter le token API Beatrice dans votre fichier `.env` :

```env
BEATRICE_API_KEY=35e6fafc-82b3-421a-9e74-57d21a92450c
```

**Note :** Si le token n'est pas défini dans le `.env`, le contrôleur utilisera la valeur par défaut fournie. Cependant, il est recommandé de le mettre dans le `.env` pour des raisons de sécurité.

## Routes disponibles

- `/blog` - Liste des articles avec pagination
- `/blog/{slug}` - Détail d'un article

## Fonctionnalités

- ✅ Liste des articles avec pagination (9 articles par page)
- ✅ Détail d'un article avec métadonnées SEO
- ✅ Articles similaires (featured) basés sur les tags
- ✅ Cache des requêtes API (1 heure)
- ✅ Optimisation SEO (meta tags, Open Graph, Twitter Card)
- ✅ Design responsive avec Bootstrap 5
- ✅ Lien dans la sidebar

## Structure des vues

- `resources/views/blog/index.blade.php` - Page liste des articles
- `resources/views/blog/show.blade.php` - Page détail d'un article

