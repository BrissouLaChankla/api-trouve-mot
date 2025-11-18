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

    <title>Blog - API Trouve-mot | Articles sur les API linguistiques et la génération de mots</title>
    <meta name="description" content="Découvrez nos articles sur les API linguistiques, la génération de mots aléatoires, l'éducation numérique et bien plus encore. Conseils, guides et actualités pour vos projets." />
    <meta name="keywords" content="API linguistiques, génération de mots, éducation numérique, API français, mots aléatoires" />
    <link rel="canonical" href="{{ url('/blog') }}" />
    
    <!-- Open Graph -->
    <meta property="og:title" content="Blog - API Trouve-mot" />
    <meta property="og:description" content="Articles sur les API linguistiques et la génération de mots" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/blog') }}" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Styles -->
    <style>
        h1, h2, h3, h4, h5, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: 'Secular One', sans-serif;
        }
        
        .article-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            border: none;
            border-radius: 12px;
        }
        
        .article-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08) !important;
        }
        
        .article-image {
            height: 180px;
            object-fit: cover;
            width: 100%;
            border-radius: 12px 12px 0 0;
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
        
        .article-link {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.2s ease;
        }
        
        .article-link:hover {
            color: #0a58ca;
            gap: 0.75rem;
        }
        
        .article-link i {
            font-size: 0.875rem;
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
    
        <div class="container-fluid my-5 px-3">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-3">Blog</h1>
                    <p class="lead text-muted mb-5">Découvrez nos articles sur les API linguistiques, la génération de mots et l'éducation numérique</p>
                </div>
            </div>

            <div class="row g-4">
                @forelse($articles as $article)
                    <div class="col-md-6 col-lg-3">
                        <article class="card article-card shadow-sm h-100">
                            @if(isset($article['image']) && $article['image'])
                                <a href="{{ route('blog.show', $article['slug']) }}">
                                    <img src="{{ $article['image'] }}" class="card-img-top article-image" alt="{{ $article['title'] }}" loading="lazy">
                                </a>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h2 class="card-title h6 mb-2">
                                    <a href="{{ route('blog.show', $article['slug']) }}" class="text-dark text-decoration-none">
                                        {{ $article['title'] }}
                                    </a>
                                </h2>
                                @if(isset($article['meta_description']))
                                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit($article['meta_description'], 100) }}</p>
                                @endif
                                <div class="d-flex justify-content-between">
                                <div class="article-meta ">
                                    @if(isset($article['publishedAt']))
                                        <i class="bi bi-calendar3"></i>
                                        <time datetime="{{ $article['publishedAt'] }}">
                                            {{ \Carbon\Carbon::parse($article['publishedAt'])->format('d/m/Y') }}
                                        </time>
                                    @endif
                                </div>
                                    <a href="{{ route('blog.show', $article['slug']) }}" class="article-link mt-auto">
                                        Lire l'article <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            <p class="mb-0">Aucun article disponible pour le moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if(isset($pagination) && $pagination['pages'] > 1)
                <nav aria-label="Pagination des articles" class="mt-5">
                    <ul class="pagination justify-content-center">
                        @if($currentPage > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ route('blog.index', ['page' => $currentPage - 1]) }}" aria-label="Précédent">
                                    <span aria-hidden="true">&laquo; Précédent</span>
                                </a>
                            </li>
                        @endif

                        @for($i = 1; $i <= $pagination['pages']; $i++)
                            @if($i == $currentPage)
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">{{ $i }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('blog.index', ['page' => $i]) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor

                        @if($currentPage < $pagination['pages'])
                            <li class="page-item">
                                <a class="page-link" href="{{ route('blog.index', ['page' => $currentPage + 1]) }}" aria-label="Suivant">
                                    <span aria-hidden="true">Suivant &raquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>

        <footer class="bg-white border-top text-center py-3 text-muted mt-5">
            <small>Pour toute question : <a target="_blank" href="https://brice-eliasse.com">Brice Eliasse</a></small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

