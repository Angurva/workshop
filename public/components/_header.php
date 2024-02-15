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

      <div class="navbar-nav offset-1 ms-auto me-5 d-none d-lg-flex">
        <div class="navbar-text text-color" id="daytime"> </div>
      </div>
      <?php 
        if(isset($_SESSION['id']))
        {
        ?>
          <div class="navbar-nav ms-auto me-3 d-none d-lg-flex ">
            <form action="/opinions" method="POST">
              <button type="submit" class="btn btn-primary position-relative me-5 mt-2" style="height:30px"><i class="bi bi-chat-square-dots"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $_SESSION['op_pending'] ?>
                </span>
            </button>
            </form>
          <!--<a href="#"><img src="assets/icons8-commentaire-48.png" alt="" class="mt-1 me-3"></a>-->
            <form action="/forms-list" method="POST">
            <button type="button" class="btn btn-primary position-relative me-5 mt-2" style="height:30px"><i class="bi bi-envelope-arrow-down"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $_SESSION['co_pending'] ?>
              </span>
            </button>
          </form>
         
         
          <div class="mt-2"><?php echo $_SESSION['prenom'].' ' . $_SESSION['nom'] ?></div>
          
            <button type="button" class="btn btn-primary position-relative mx-2 mt-2" style="height:30px"data-bs-toggle="modal" data-bs-target="#changepwd"><i class="bi bi-key"></i></i>

            </button>
          </form>

          <a class="nav-item nav-link text-color-a fs-6 fst-italic text-decoration-underline " href="/connection/logout">logout</a>
          <?php
        }
        else{
          ?>
          <a class="nav-item nav-link text-color-a ms-auto me-5" href="/connection">se connecter</a>
          <?php
        }
        ?>
      </div>
      
    </nav>
  </header>

<div class="modal fade" id="formContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Texte à modifier</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="/contact" method="POST">
          <div class="input-group mb-3">
            <span class="input-group-text">Prénom</span>
            <input type="text" class="form-control" placeholder="Prénom" name="co_firstname">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Nom</span>
            <input type="text" class="form-control" placeholder="Nom" name="co_lastname">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Email</span>
            <input type="email" class="form-control" placeholder="Addresse mail" name="co_email">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Tél.</span>
            <input type="tel" class="form-control" placeholder="Tél" name="co_phone" pattern="[0-9]{2}[0-9]{8}" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Sujet</span>
            <input type="text" class="form-control" placeholder="Sujet" name="co_subject">
          </div>
          <div>
            <textarea name="co_description"  cols="100" rows="10" class="form-control my-3" placeholder="Description"></textarea>
          </div>
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="changepwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Texte à modifier</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="/management/change-pwd" method="POST">
            <!--<div class="input-group mb-3">
              <span class="input-group-text">Ancien mot de passe</span>
              <input type="password" class="form-control" placeholder="old password" name="old_password">
            </div>-->
            <div class="input-group mb-3">
              <span class="input-group-text">nouveau mot de passe</span>
              <input type="password" class="form-control" placeholder="new password" name="new_password">
            </div>
            <!--<div class="input-group mb-3">
              <span class="input-group-text">Confirmation nouveau mot de passe</span>
              <input type="password" class="form-control" placeholder="confirm new password" name="new_password">
            </div>-->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
      </div>
    </div>
  </div>
</div>