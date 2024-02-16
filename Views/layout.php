<?php
 // session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle ?? "Garage Parrot" ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mina">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  
</head>

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
          <?php
          if(isset($_SESSION['id']) && $_SESSION['role']== 1)
          {
          ?>
          <li class="nav-item"><a class="nav-link text-color-a" href="/management">Gestion</a></li>
          <?php } ?>
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
            <form action="/contacts-list" method="POST">
            <button type="submit" class="btn btn-primary position-relative me-5 mt-2" style="height:30px"><i class="bi bi-envelope-arrow-down"></i>
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

   
    <?php echo $pageContent ?? "" ?>
   

  <footer class="container-fluid">
    <div class="row mt-4 footer-color-bg">
      <div class="col-sm-12 col-lg-4 offset-1">
        <h3 class="offset-4 mt-3">Horaires</h3>
        <table class="mt-3 mb-0 offset-0"><!--table table-borderless table-sm  table-striped-->
          <thead>
            <tr>
              <th></th>
              <th class="px-4" scope="col">Matin</th>
              <th class="px-4" scope="col">Après-midi</th>        
            </tr>
          </thead>
          <tbody>
            
            <?php
              //header('Location: /scheduler');
            foreach ($schedulers as $scheduler): ?>
            <tr class="">
              <th class="px-4 " scope="row"><?php echo $scheduler['sc_day'] ?></th>
              <td class="px-4" > <time><?php echo $scheduler['sc_am_start'] ?></time> - <?php echo $scheduler['sc_am_end'] ?></td>
              <td class="px-4"><?php echo $scheduler['sc_ap_start'] ?> - <?php echo $scheduler['sc_ap_end'] ?></td> 
            </tr>
            <?php endforeach ?>
           <!-- <tr>
              <th class="px-4" scope="row">Mardi</th>
              <td class="px-4">09:00 - 12:00</td>
              <td class="px-4">14:00 - 18:00</td>
            </tr>
            <tr>
              <th class="px-4" scope="row">Mercredi</th>
              <td class="px-4">09:00 - 12:00</td>
              <td class="px-4">14:00 - 18:00</td>
            </tr>
            <tr>
              <th class="px-4" scope="row">Jeudi</th>
              <td class="px-4">09:00 - 12:00</td>
              <td class="px-4">14:00 - 18:00</td>
            </tr>
            <tr>
              <th class="px-4" scope="row">Vendredi</th>
              <td class="px-4">09:00 - 12:00</td>
              <td class="px-4">14:00 - 18:00</td>
            </tr>-->
          </tbody>
        </table>
        <?php
              if(isset($_SESSION['id']) && $_SESSION['role']== 1)
              {
                ?>
                <?php ?>
                  <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modal_scheduler" id="btn_modal_scheduler">
                    <i class="bi bi-pencil-square"></i>
                  </button>
              <?php
              }
              ?>
           
        
      </div><!-- ************************ -->
      <div class="col-sm-12 col-lg-4 row align-items-center offset-2">
        <!--<div class="col-sm-6">-->
          <h3 class="m-3">Contact</h3>
        <!--</div>-->
        <div class="col-sm-6">
          <div class="m-2">
            <span class=""><i class="bi bi-house-fill fs-5"></i> : 69 blvd des Veilleurs de la Voie, 699656 La forêt Enchantée</span>
          </div>
          <div class="m-2">
            <span class=""><i class="bi bi-telephone-fill fs-5"></i> : 04 22 22 22 22</span>
          </div>
          <div class="m-2 formulaire">
            <a class="nav-item nav-link" href="#" data-bs-toggle="modal" data-bs-target="#formContact"><i class="bi bi-info-square-fill fs-5"></i> : Formulaire</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 text-center">
            
        <span class="cluf">&#127279; copyleft | Angurva 2024.</span>
    </div>
  </footer>  

<div class="modal fade" id="modal_scheduler" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Texte à modifier</h4>
        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          
            <?php foreach($schedulers as $scheduler): ?>
            <form action="/scheduler/change" method="POST">
            <div>
            <label for="" name=""><?php echo $scheduler['sc_day'] ?></label>
            <input type="hidden" name="sc_day" value="<?php echo $scheduler['sc_day']?>">
            <input type="time" name="sc_am_start" value="<?php echo $scheduler['sc_am_start'] ?>">  
            <input type="time" name="sc_am_end" value="<?php echo $scheduler['sc_am_end'] ?>" >
            <input type="time" name="sc_ap_start" value="<?php echo $scheduler['sc_ap_start'] ?>"> 
            <input type="time" name="sc_ap_end" value="<?php echo $scheduler['sc_ap_end'] ?>" >

              <button type="submit" class="btn btn-primary">modify</button>
            </div>
            </form>
            
            <?php endforeach ?>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           
       
        </div>
    </div>
  </div>
</div>



  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/daytimeShow.js"></script>
  <script src="js/sliders.js"></script>
  <script type="text/javascript">

/*var myModal = new bootstrap.Modal(document.getElementById('modal_mod_ent'), options);
myModal.show();*/


$("#btn_modal").on('click',function(){
 
 $('#modal_mod_ent').modal('show');
});

$("#btn_modal").on('click',function(){
 
 $('#modal_mod_mec').modal('show');
});

$("#btn_modal").on('click',function(){
 
 $('#modal_mod_car').modal('show');
});
  
  </script>
</body>
</html>
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
