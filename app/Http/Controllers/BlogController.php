<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    private function getApiToken()
    {
        return env('BEATRICE_API_KEY', '35e6fafc-82b3-421a-9e74-57d21a92450c');
    }

    private function fetchArticles($params = [])
    {
        $token = $this->getApiToken();
        $url = 'https://beatrice.app/api/articles';
        
        $queryParams = array_merge(['token' => $token], $params);
        
        try {
            $response = Http::timeout(10)->get($url, $queryParams);
            
            if ($response->successful()) {
                return $response->json();
            }
            
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function index(Request $request)
    {
        $currentPage = $request->get('page', 1);
        $limit = 9;
        
        $cacheKey = "blog_articles_page_{$currentPage}";
        
        $data = Cache::remember($cacheKey, 3600, function () use ($currentPage, $limit) {
            return $this->fetchArticles([
                'page' => $currentPage,
                'limit' => $limit
            ]);
        });
        
        if (!$data || !isset($data['data'])) {
            abort(404, 'Articles non disponibles');
        }
        
        $articles = $data['data'];
        $pagination = $data['pagination'] ?? [];
        
        return view('blog.index', compact('articles', 'pagination', 'currentPage'));
    }

    private function fetchArticleFromApi($slug, $token)
    {
        $maxRetries = 3;
        $retryDelay = 1; // secondes
        
        for ($attempt = 1; $attempt <= $maxRetries; $attempt++) {
            try {
                $response = Http::timeout(10)->get("https://beatrice.app/api/articles/{$slug}", [
                    'token' => $token
                ]);
                
                if ($response->successful()) {
                    $data = $response->json();
                    
                    // Vérifier si la réponse contient une erreur dans le body
                    if (isset($data['ok']) && $data['ok'] === false) {
                        \Log::warning('API returned error in body', [
                            'slug' => $slug,
                            'attempt' => $attempt,
                            'response' => $data
                        ]);
                        
                        // Si ce n'est pas le dernier essai, attendre avant de réessayer
                        if ($attempt < $maxRetries) {
                            sleep($retryDelay);
                            continue;
                        }
                        return null;
                    }
                    
                    return $data;
                }
                
                \Log::warning('API request failed', [
                    'slug' => $slug,
                    'status' => $response->status(),
                    'attempt' => $attempt,
                    'body' => $response->body()
                ]);
                
                // Si ce n'est pas le dernier essai, attendre avant de réessayer
                if ($attempt < $maxRetries) {
                    sleep($retryDelay);
                    continue;
                }
                
                return null;
            } catch (\Exception $e) {
                \Log::error('API exception', [
                    'slug' => $slug,
                    'attempt' => $attempt,
                    'error' => $e->getMessage()
                ]);
                
                // Si ce n'est pas le dernier essai, attendre avant de réessayer
                if ($attempt < $maxRetries) {
                    sleep($retryDelay);
                    continue;
                }
                
                return null;
            }
        }
        
        return null;
    }
    
    public function show($slug)
    {
        $token = $this->getApiToken();
        $cacheKey = "blog_article_{$slug}";
        
        // Essayer de récupérer depuis le cache d'abord
        $article = Cache::get($cacheKey);
        
        // Si pas en cache ou si c'est une erreur, faire une nouvelle requête
        if ($article === null) {
            $article = $this->fetchArticleFromApi($slug, $token);
            
            // Ne cacher que les succès, pas les erreurs
            if ($article !== null) {
                Cache::put($cacheKey, $article, 3600);
            } else {
                // Pour les erreurs, mettre un cache très court (5 minutes) pour éviter de surcharger l'API
                Cache::put($cacheKey, false, 300);
            }
        }
        
        // Si le cache contient false, c'est une erreur précédente, réessayer
        if ($article === false) {
            $article = $this->fetchArticleFromApi($slug, $token);
            if ($article !== null) {
                Cache::put($cacheKey, $article, 3600);
            }
        }
        
        // Gérer différentes structures de réponse
        if (!$article) {
            abort(404, 'Article non trouvé');
        }
        
        // La réponse de l'API pour un article individuel est : {"article": {...}, "ok": true}
        if (isset($article['article'])) {
            $articleData = $article['article'];
        } elseif (isset($article['data'])) {
            $articleData = $article['data'];
        } elseif (isset($article['_id']) || isset($article['slug'])) {
            // La réponse est directement l'article
            $articleData = $article;
        } else {
            abort(404, 'Article non trouvé - structure de réponse invalide');
        }
        
        // Log pour debug (à retirer en production si nécessaire)
        if (!isset($articleData['image']) || empty($articleData['image'])) {
            \Log::info('Article missing image', [
                'slug' => $slug,
                'has_image' => isset($articleData['image']),
                'image_value' => $articleData['image'] ?? 'not set'
            ]);
        }
        
        // Récupérer les articles featured
        $featuredArticles = [];
        if (isset($articleData['tags']) && count($articleData['tags']) > 0) {
            $firstTag = $articleData['tags'][0];
            
            $featuredCacheKey = "blog_featured_{$slug}_{$firstTag}";
            $featuredArticles = Cache::remember($featuredCacheKey, 3600, function () use ($firstTag, $slug, $token) {
                try {
                    $response = Http::timeout(10)->get('https://beatrice.app/api/articles', [
                        'limit' => 3,
                        'published' => 'published',
                        'tag' => $firstTag,
                        'excludeSlug' => $slug,
                        'token' => $token
                    ]);
                    
                    if ($response->successful()) {
                        $data = $response->json();
                        return $data['data'] ?? [];
                    }
                    
                    return [];
                } catch (\Exception $e) {
                    return [];
                }
            });
        }
        
        return view('blog.show', compact('articleData', 'featuredArticles'));
    }
}

