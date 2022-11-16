<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>API Trouve-mot - Génère des mots aléatoires gratuitement !</title>
    <meta name="description" content="API Trouve-mot permet de générer des mots aléatoires et de leur catégorie. C'est totalement gratuit !" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <!-- Styles -->
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: 'Secular One', sans-serif;
        }

    </style>
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="antialiased">
<div id="backdrop" class="d-none"></div>
    @include('sidebar')
    
    <div id="app">
        <header class="border-bottom py-2 position-sticky bg-white top-0 left-0 w-100  align-items-center justify-content-between px-3">
            <a href="/" class="d-flex align-items-center  link-dark text-decoration-none ">
                <img src="{{asset('img/logo.webp')}}" width="50" class="logo me-2"/>
              <span class="h6 text-muted m-0 fs-5 fw-semibold">Trouve-mot</span>
            </a>

            <div id="burger" class="">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>
    
        <div class="container-fluid my-5">
                    <h1>API gratuite de mots aléatoires</h1>
                    <p>Si pour un projet vous avez besoin de récupérer des mots triés ou non par catégories, vous êtes au bon endroit !</p>
                    <p>Vous retrouverez ici <strong>{{$wordsCount}}</strong> mots français parmis <strong>{{$categoriesCount}}</strong> catégories différentes.</p>
                    
        </div>


        <div class="py-5 bg-light" id="random">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="mb-4">Récupérer des mots aléatoires</h2>
                    <div class="col-xxl-6 pe-xxl-5">
                        <h6>Endpoints :</h6>
                        <pre class="white"><code><a href="https://trouve-mot.fr/api/random">https://trouve-mot.fr/api/random</a>     <small class="text-success">// Génère 1 mot aléatoire</small>   </code>
<code><a href="https://trouve-mot.fr/api/random/10">https://trouve-mot.fr/api/random/10</a>  <small class="text-success">// Génère 10 mots aléatoires</small></code></pre>
                        <h6>Exemple :</h6>
                        <pre class="dark">
<span class="function">fetch</span><span class="punctuation">("</span><span class="string">https://trouve-mot.fr/api/random/2</span><span class="punctuation">")</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>response<span class="punctuation">)</span> => response.<span class="function">json</span><span class="punctuation">())</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>words<span class="punctuation">)</span> => <span class="console">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span>words<span class="punctuation">))</span></pre>

                    </div>

                    <div class="col-xxl-6">
                        <h6>Output :</h6>
                        <pre class="white" id="output1"><code></code></pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5" id="startwith">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="mb-4" id="random">Récupérer des mots commençant par...</h2>
                    <div class="col-xxl-6 pe-xxl-5">
                        <h6>Endpoints :</h6>
                        <pre class="light"><code><a href="https://trouve-mot.fr/api/startwith/B">https://trouve-mot.fr/api/startwith/B</a>     <small class="text-success">// Génère 1 mot aléatoire commençant par B</small>   </code>
<code><a href="https://trouve-mot.fr/api/startwith/B/10">https://trouve-mot.fr/api/startwith/B/10</a>  <small class="text-success">// Génère 10 mots aléatoires commençant par B</small></code></pre>
                        <h6>Exemple :</h6>
                        <pre class="dark">
<span class="function">fetch</span><span class="punctuation">("</span><span class="string">https://trouve-mot.fr/api/startwith/B/2</span><span class="punctuation">")</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>response<span class="punctuation">)</span> => response.<span class="function">json</span><span class="punctuation">())</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>words<span class="punctuation">)</span> => <span class="console">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span>words<span class="punctuation">))</span></pre>

                    </div>

                    <div class="col-xxl-6">
                        <h6>Output :</h6>
                        <pre class="light" id="output2"><code></code></pre>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-5 bg-light" id="belongsto">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <h2 class=" d-inline-block me-4 mb-0" id="random">Récupérer des mots par catégorie</h2>
                        <!-- Button trigger modal -->
                        <div class="py-4 d-inline-block">
                            <button type="button" class="btn btn-primary btn-sm" style="margin-bottom:10px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Voir les catégories
                            </button>
                        </div>
                    </div>

                    <div class="col-xxl-6 pe-xxl-5">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Toutes les catégories</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Catégories</th>
                                                    <th scope="col">Endpoints</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $categorie)
                                                @php
                                                $rand = rand(1,8);
                                                @endphp
                                                <tr style="vertical-align:middle    ">
                                                    <th scope="row">{{$categorie->id}}</th>
                                                    <td>{{$categorie->name}}</td>
                                                    <td>
                                                        <pre class="light m-0 p-2"><code><a href="https://trouve-mot.fr/api/categorie/{{$categorie->id}}/{{$rand}}">"https://trouve-mot.fr/api/categorie/{{$categorie->id}}/{{$rand}}</a></code></td>
                                                </tr>
                                        @endforeach
                                  
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <h6>Endpoints :</h6>
                        <pre class="white"><code><a href="https://trouve-mot.fr/api/categorie/19">https://trouve-mot.fr/api/categorie/19</a>     <small class="text-success">// Génère 1 mot de la catégorie "ANIMAUX"</small>   </code>
<code><a href="https://trouve-mot.fr/api/categorie/19/10">https://trouve-mot.fr/api/categorie/19/10</a></code></pre>
                                                        <h6>Exemple :</h6>
                                                        <pre class="dark">
<span class="function">fetch</span><span class="punctuation">("</span><span class="string">https://trouve-mot.fr/api/categorie/19/2</span><span class="punctuation">")</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>response<span class="punctuation">)</span> => response.<span class="function">json</span><span class="punctuation">())</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>words<span class="punctuation">)</span> => <span class="console">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span>words<span class="punctuation">))</span></pre>

                                    </div>

                                    <div class="col-xxl-6">
                                        <h6>Output :</h6>
                                        <pre class="white" id="output3"><code></code></pre>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="py-5" id="daily">
                            <div class="container-fluid">
                                <div class="row">
                                    <h2 class="mb-4" id="random">Récupérer le mot du jour</h2>
                                    <div class="col-xxl-6 pe-xxl-5">
                                        <h6>Endpoints :</h6>
                                        <pre class="light"><a href="https://trouve-mot.fr/api/daily">https://trouve-mot.fr/api/daily</a>
<a href="https://trouve-mot.fr/api/weekly">https://trouve-mot.fr/api/weekly</a>
<a href="https://trouve-mot.fr/api/montly">https://trouve-mot.fr/api/monthly</a></pre>
                                        <h6>Exemple :</h6>
                                        <pre class="dark">
<span class="function">fetch</span><span class="punctuation">("</span><span class="string">https://trouve-mot.fr/api/daily</span><span class="punctuation">")</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>response<span class="punctuation">)</span> => response.<span class="function">json</span><span class="punctuation">())</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>words<span class="punctuation">)</span> => <span class="console">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span>words<span class="punctuation">))</span></pre>

                                    </div>

                                    <div class="col-xxl-6">
                                        <h6>Output :</h6>
                                        <pre class="light" id="output4"><code></code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="py-5 bg-light" id="random">
                            <div class="container-fluid">
                                <div class="row">
                                    <h2 class="mb-4">Récupérer des mots en fonction de leur longueur</h2>
                                    <div class="col-xxl-6 pe-xxl-5">
                                        <h6>Endpoints :</h6>
                                        <pre class="white"><code><a href="https://trouve-mot.fr/api/size/5">https://trouve-mot.fr/api/size/5</a>      <small class="text-success">// Génère 1 mot aléatoire de 5 caractères</small>   </code>
<code><a href="https://trouve-mot.fr/api/size/5/10">https://trouve-mot.fr/api/size/5/10</a></code>

<code><a href="https://trouve-mot.fr/api/sizemin/6">https://trouve-mot.fr/api/sizemin/6</a>   <small class="text-success">// Génère 1 mot aléatoire de minimum 6 caractères</small></code>
<code><a href="https://trouve-mot.fr/api/sizemin/6/10">https://trouve-mot.fr/api/sizemin/6/10</a></code>

<code><a href="https://trouve-mot.fr/api/sizemax/4">https://trouve-mot.fr/api/sizemax/4</a>   <small class="text-success">// Génère 1 mot aléatoire de maximum 4 caractères</small>   </code>
<code><a href="https://trouve-mot.fr/api/sizemax/4/10">https://trouve-mot.fr/api/sizemax/4/10</a> </code>
</pre>
                                        <h6>Exemple :</h6>
                                        <pre class="dark">
<span class="function">fetch</span><span class="punctuation">("</span><span class="string">https://trouve-mot.fr/api/sizemin/6/2</span><span class="punctuation">")</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>response<span class="punctuation">)</span> => response.<span class="function">json</span><span class="punctuation">())</span>
    <span class="punctuation">.</span><span class="function">then</span><span class="punctuation">((</span>words<span class="punctuation">)</span> => <span class="console">console</span><span class="punctuation">.</span><span class="function">log</span><span class="punctuation">(</span>words<span class="punctuation">))</span></pre>
                
                                    </div>
                
                                    <div class="col-xxl-6">
                                        <h6>Output :</h6>
                                        <pre class="white" id="output5"><code></code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>


<footer class="bg-white border-top text-center py-3 text-muted">
    <small>Pour toute question : <a target="_blank" href="https://brice-eliasse.com">Brice Eliasse</a></small>
</footer>


                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function(event) {


                            const fillCodeExamples = async () => {

                                const response1 = await fetch("https://trouve-mot.fr/api/random/2");
                                if (!response1.ok) {
                                    const msg = `Il y a eu une erreur`;
                                    throw new Error(msg);
                                }
                                const words1 = await response1.json();
                                document.getElementById("output1").innerHTML = JSON.stringify(words1, undefined, 2);


                                const response2 = await fetch("https://trouve-mot.fr/api/startwith/B/2");
                                if (!response2.ok) {
                                    const msg = `Il y a eu une erreur`;
                                    throw new Error(msg);
                                }
                                const words2 = await response2.json();
                                document.getElementById("output2").innerHTML = JSON.stringify(words2, undefined, 2);


                                const response3 = await fetch("https://trouve-mot.fr/api/categorie/19/2");
                                if (!response3.ok) {
                                    const msg = `Il y a eu une erreur`;
                                    throw new Error(msg);
                                }
                                const words3 = await response3.json();
                                document.getElementById("output3").innerHTML = JSON.stringify(words3, undefined, 2);


                                const response4 = await fetch("https://trouve-mot.fr/api/daily");
                                if (!response4.ok) {
                                    const msg = `Il y a eu une erreur`;
                                    throw new Error(msg);
                                }
                                const words4 = await response4.json();
                                document.getElementById("output4").innerHTML = JSON.stringify(words4, undefined, 2);


                                const response5 = await fetch("https://trouve-mot.fr/api/sizemin/6/2");
                                if (!response5.ok) {
                                    const msg = `Il y a eu une erreur`;
                                    throw new Error(msg);
                                }
                                const words5 = await response5.json();
                                document.getElementById("output5").innerHTML = JSON.stringify(words5, undefined, 2);

                            }

                            fillCodeExamples();



                        });

                    </script>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
