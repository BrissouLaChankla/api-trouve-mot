<div class="d-flex flex-column shadow-sm top-0 left-0 flex-shrink-0 p-3 bg-white vh-100 position-fixed sidebar" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <img src="{{asset('img/logo.webp')}}" width="50" class="logo me-2"/>
      <span class="h6 text-muted m-0 fs-5 fw-semibold">Trouve-mot</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#mots-collapse" aria-expanded="true">
          Mot
        </button>
        <div class="collapse show" id="mots-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#random" class="link-dark rounded">Aléatoire</a></li>
            <li><a href="#startwith" class="link-dark rounded">Commençant par _</a></li>
            <li><a href="#belongsto" class="link-dark rounded">Appartenant à la catégorie _</a></li>
            <li><a href="#size" class="link-dark rounded">Selon sa longueur</a></li>
            <li><a href="#daily" class="link-dark rounded">Du jour / semaine / mois</a></li>
          </ul>
        </div>
      </li>
     
      <li class="border-top my-3"></li>
      

    </ul>
    <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="brissou" data-color="#5F7FFF" data-emoji="" data-font="Lato" data-text="Buy me a coffee" data-outline-color="#000000" data-font-color="#ffffff" data-coffee-color="#FFDD00" ></script>
  </div>