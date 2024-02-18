<?php
$pageTitle = 'annonces';
?>
 <main class="container mt-3">
    <?php
    if(isset($_SESSION['id']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['role']== 3))
    {
    ?>
    <a href="/announces-add" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on top">Ajouter une Annonce</a>

      <?php } ?>
      <div class="d-flex justify-content-between ">
        <div class="search ms-5 col-sm-3">
          <label for="sliderPrice" class="form-label">Prix: </label>
          <span id="rangePrice"></span><span> €</span>
          <div id="sliderPrice" ></div>
          <button type="button" id="button-reset-price" class="btn btn-info m-3">Réinitialiser</button>
          
        </div>

        <div class="search col-sm-3">
          <label for="sliderKM" class="form-label">Kilométrage: </label>
          <span id="rangeKm"></span><span>Km</span>
          <div id="sliderKM"></div>
          <button type="button" id="button-reset-km" class="btn btn-info m-3">Réinitialiser</button>
        </div>

        <div class="search col-sm-3">
          <label for="sliderYear" class="form-label">Année: </label>
          <span id="rangeYear"></span><span> </span>
          <div id="sliderYear"></div>
          <button type="button" id="button-reset-year" class="btn btn-info m-3">Réinitialiser</button>
        </div>

      </div>
    

    <section class="row justify-content-sm-center justify-content-md-evenly justify-content-lg-center p-2" id="announcelist">
    <?php 
      foreach ($announces as $announce):
    ?>
      <article class="card col-lg-4 m-3 p-0 card-announces">
        <img src=<?php echo $announce['ve_photo'] ?> class="card-img-top img-fluid " alt="" >
        <div class="card-body">
          <h5 class="card-title"><?php echo $announce['br_name']. ' ' . $announce['mo_name'] ?></h5><span>Année: <?php echo $announce['ve_year'] ?></span>
          <div class="card-text"> Kilométrage: <?php echo $announce['ve_km'] ?> km</div>
          <p class="card-text">Moteur: <?php echo $announce['en_name'] ?></p>
          <div class="card-text">Couleur: <?php echo $announce['ve_color'] ?> </div>
          <p class="card-text">Nombre de portes: <?php echo $announce['ve_doors'] ?> </p>
          <div class="card-text">Prix: <?php echo $announce['ve_price'] ?> € </div> 

          <form action="/announce-details" method="POST">
            <input type="hidden" name="ve_id" value="<?php echo $announce['ve_id'] ?>">
            <button type="submit" class="btn btn-outline-primary"> Détails</button>
          </form>
        
          <!-- <a href="#" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on top">Details</a>-->


          <?php
          if(isset($_SESSION['id']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['role']== 3))
          {
          ?>
          <!--<a href="#" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on top">Modifier</a>-->

          <?php 
          } 
          ?>
        </div>
      </article>

     <?php endforeach ?>
    </section>
  </main>
