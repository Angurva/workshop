<body onload="datetimeShow()">
  <header class="container-fluid p-0 m-0 sticky-top">
    <nav class="navbar navbar-expand-lg navbar-color navbar-dark"><!--navbar-dark bg-dark-->
      <a href="#" class="navbar-brand ms-3 text-color-a">GarageParrot</a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse flex-grow-0 offset-1" id="navbar-content">
        <ul class="navbar-nav ms-3 ">
          <li class="nav-item"><a class="nav-link text-color-a" href="/">Accueil</a></li>
          <li class="nav-item"><a class="nav-link text-color-a" href="/announces">Annonces</a></li>
          <li class="nav-item"><a class="nav-link text-color-a" href="#" data-bs-toggle="modal" data-bs-target="#formContact">Nous contacter</a></li>
          <li class="nav-item"><a class="nav-link text-color-a" href="/management">Gestion</a></li>
        </ul>
      </div>

      <div class="navbar-nav offset-2 me-5 d-none d-lg-flex">
        <div class="navbar-text text-color" id="daytime"> </div>
      </div>
      <div class="navbar-nav ms-auto me-3 d-none d-lg-flex ">
        <a href="#"><img src="assets/icons8-commentaire-48.png" alt="" class="mt-1 me-3"></a>
        <a href="#"><img src="assets/icons8-nouveau-message-48.png" alt=""class="me-5"></a>
        <a class="nav-item nav-link text-color-a" href="#">se connecter</a>
      </div>
      
    </nav>
  </header>