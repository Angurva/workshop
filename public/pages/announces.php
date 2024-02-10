<?php

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_head.php');

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_header.php');
?>
 <main class="container mt-3">
    
      <div class="search">
        <label for="customRange2" class="form-label">Example range</label>
        <input type="range" class="" min="0" max="5" id="customRange2">
        <div id="sliderPrice"></div>
      </div>
      <section class="row justify-content-sm-center justify-content-md-evenly justify-content-lg-center p-2" id="test">
      <?php 
        foreach ($announces as $announce)://assets/r5-electric-.jpg

      ?>
        <article class="card col-lg-4 m-3 p-0">
            <img src=<?php echo $announce['ve_photo'] ?> class="card-img-top img-fluid " alt="" >
            <div class="card-body">
                <h5 class="card-title"><?php echo $announce['br_name']. '' . $announce['mo_name'] ?></h5><span>Année: <?php echo $announce['ve_year'] ?></span>
                <p class="card-text"> kilométrage : <?php echo $announce['ve_km'] ?> km</p>
                <p class="card-text">Moteur: <?php echo $announce['en_name'] ?></p>
                <div class="card-text">Couleur: <?php echo $announce['ve_color'] ?> </div>
                <p class="card-text">Nombre de portes: <?php echo $announce['ve_doors'] ?> </p>
                <div class="card-text">Prix: <?php echo $announce['ve_price'] ?> € </div> 
                <a href="#" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on top">Details</a>
            </div>
        </article>

        <?php endforeach ?>
        </section>
  </main>

<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_footer.php');
?>