<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4X9B9HDC4D"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-4X9B9HDC4D');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $articleData['title'] }} - API Trouve-mot</title>
    <meta name="description" content="{{ $articleData['meta_description'] ?? 'Découvrez cet article sur les API linguistiques et la génération de mots' }}" />
    <meta name="keywords" content="{{ isset($articleData['tags']) ? implode(', ', $articleData['tags']) : 'API linguistiques, génération de mots' }}" />
    <link rel="canonical" href="{{ url('/blog/' . $articleData['slug']) }}" />
    <link rel="sitemap" type="application/xml" href="{{ url('/sitemap.xml') }}" />
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $articleData['title'] }}" />
    <meta property="og:description" content="{{ $articleData['meta_description'] ?? '' }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url('/blog/' . $articleData['slug']) }}" />
    @if(isset($articleData['image']) && $articleData['image'])
        <meta property="og:image" content="{{ $articleData['image'] }}" />
    @endif
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $articleData['title'] }}" />
    <meta name="twitter:description" content="{{ $articleData['meta_description'] ?? '' }}" />
    @if(isset($articleData['image']) && $articleData['image'])
        <meta name="twitter:image" content="{{ $articleData['image'] }}" />
    @endif
    
    <!-- Article meta -->
    @if(isset($articleData['publishedAt']))
        <meta property="article:published_time" content="{{ $articleData['publishedAt'] }}" />
    @endif
    @if(isset($articleData['updatedAt']))
        <meta property="article:modified_time" content="{{ $articleData['updatedAt'] }}" />
    @endif
    @if(isset($articleData['tags']))
        @foreach($articleData['tags'] as $tag)
            <meta property="article:tag" content="{{ $tag }}" />
        @endforeach
    @endif
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        #app {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        
        .container-fluid {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 2rem;
            padding-top: 2rem;
            margin-bottom: 2rem;
        }
        
        h1, h2, h3, h4, h5, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: 'Secular One', sans-serif;
        }
        
        .article-header-image {
            max-height: 500px;
            width: 100%;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: block;
        }
        
        .article-content {
            line-height: 1.8;
            font-size: 1.1rem;
            max-width: 100%;
        }
        
        .article-content h2 {
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
        }
        
        .article-content h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        
        .article-content p {
            margin-bottom: 1.25rem;
        }
        
        .article-meta {
            font-size: 0.875rem;
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .article-meta i {
            font-size: 0.9rem;
        }
        
        .featured-article-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: none;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            display: flex;
            flex-direction: row;
            overflow: hidden;
            cursor: pointer;
        }
        
        .featured-article-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important;
        }
        
        .featured-article-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            flex-shrink: 0;
            border-radius: 8px 0 0 8px;
        }
        
        .featured-article-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .featured-sidebar {
            position: sticky;
            top: 100px;
        }
        
        .article-main {
            padding-left: 2rem;
            padding-right: 2rem;
        }
        
        .article-main header {
            display: block!important;
            visibility: visible;
        }
        
        @media (max-width: 991.98px) {
            .article-main {
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>
    
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4245635349326760" crossorigin="anonymous"></script>
</head>
<body class="antialiased">
    <div id="backdrop" class="d-none"></div>
    @include('sidebar')
    
    <div id="app">
        <header class="border-bottom py-2 position-sticky bg-white top-0 left-0 w-100 align-items-center justify-content-between px-3">
            <a href="/" class="d-flex align-items-center link-dark text-decoration-none">
                <img src="{{asset('img/logo.webp')}}" width="50" class="logo me-2"/>
                <span class="h6 text-muted m-0 fs-5 fw-semibold">Trouve-mot</span>
            </a>

            <div id="burger" class="">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 mt-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}" class="text-decoration-none">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ isset($articleData['title']) ? Str::limit($articleData['title'], 50) : 'Article' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    @if(isset($articleData) && is_array($articleData))
                        <article class="article-main">
                            <header class="mb-4">
                                @if(!empty($articleData['image'] ?? ''))
                                    <img src="{{ $articleData['image'] }}" alt="{{ $articleData['title'] ?? 'Article' }}" class="article-header-image" loading="eager">
                                @endif
                                <div class="article-meta mb-3">
                                    @if(!empty($articleData['publishedAt']))
                                        <i class="bi bi-calendar3"></i>
                                        <time datetime="{{ $articleData['publishedAt'] }}">
                                            Publié le {{ \Carbon\Carbon::parse($articleData['publishedAt'])->format('d/m/Y') }}
                                        </time>
                                    @endif
                                    @if(!empty($articleData['updatedAt']) && $articleData['updatedAt'] != ($articleData['publishedAt'] ?? ''))
                                        <span class="ms-3">
                                            <i class="bi bi-clock"></i>
                                            Mis à jour le {{ \Carbon\Carbon::parse($articleData['updatedAt'])->format('d/m/Y') }}
                                        </span>
                                    @endif
                                </div>
                                <h1>{{ $articleData['title'] ?? 'Article' }}</h1>
                                
                               
                            </header>

                            <div class="article-content">
                                @if(!empty($articleData['content']))
                                    {!! $articleData['content'] !!}
                                @else
                                    <p class="text-muted">Le contenu de l'article sera bientôt disponible.</p>
                                @endif
                            </div>
                        </article>
                    @else
                        <div class="alert alert-danger">
                            <p>Erreur : Les données de l'article ne sont pas disponibles.</p>
                        </div>
                    @endif
                </div>

                <aside class="col-lg-4">
                    <div class="featured-sidebar">
                        @if(count($featuredArticles) > 0)
                            <div class="card shadow-sm mb-4 border-0">
                                <div class="card-header bg-white border-bottom">
                                    <h3 class="h6 mb-0 fw-semibold">Articles similaires</h3>
                                </div>
                                <div class="card-body px-3">
                                    @foreach($featuredArticles as $featured)
                                        <a href="{{ route('blog.show', $featured['slug']) }}" class="text-decoration-none text-dark">
                                            <div class="card featured-article-card shadow-sm">
                                                @if(isset($featured['image']) && $featured['image'])
                                                    <img src="{{ $featured['image'] }}" class="featured-article-image" alt="{{ $featured['title'] }}" loading="lazy">
                                                @endif
                                                <div class="featured-article-content p-2">
                                                    <h4 class="card-title h6 mb-0 small">
                                                        {{ Str::limit($featured['title'], 100) }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center p-4">
                                <h3 class="h6 mb-3 fw-semibold">Découvrez notre API</h3>
                                <p class="text-muted small mb-3">
                                    Générez des mots aléatoires gratuitement avec notre API.<br>
                                    + de 3575 mots français parmi 27 catégories différentes !
                                </p>
                                <a href="/" class="btn btn-outline-primary">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

        <footer class="bg-white border-top text-center py-3 text-muted mt-5">
            <small>Pour toute question : <a target="_blank" href="https://brice-eliasse.com">Brice Eliasse</a></small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

