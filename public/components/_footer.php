<footer class="container-fluid">
    <div class="row mt-4 footer-color-bg">
      <div class="col-sm-12 col-lg-4 offset-2">
        <h3 class="offset-4 mt-3">Horaires</h3>
        <table class="mt-3 mb-0 offset-1"><!--table table-borderless table-sm  table-striped-->
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
          <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modal_scheduler" id="btn_modal_scheduler">
            Modifier
          </button>
        <?php
          }
        ?>
      </div><!-- ************************ -->
      <div class="col-sm-12 col-lg-4 row align-items-center offset-1">
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
          <form action="/scheduler/change" method="POST">
            <?php foreach($schedulers as $scheduler): ?>
            <div>
            <label for="" name=""><?php echo $scheduler['sc_day'] ?></label>
            <input type="hidden" name="sc_day" value="<?php echo $scheduler['sc_day']?>">
            <input type="time" datetime="00:00" name="sc_am_start" value="<?php echo $scheduler['sc_am_start'] ?>">  <input type="time" name="sc_am_end" value="<?php echo $scheduler['sc_am_end'] ?>" >
            <input type="time" name="sc_ap_start" value="<?php echo $scheduler['sc_ap_start'] ?>">  <input type="time" name="sc_ap_end" value="<?php echo $scheduler['sc_ap_end'] ?>" >
            </div>
            <?php endforeach ?>
            <!--
            <input type="text" name="title" readonly value=<?php echo $services[1]['se_title']; ?> class="form-control">
            <textarea name="description" id="" cols="100" rows="10" class="form-control my-3"><?php //echo $services[1]['se_description']; ?></textarea>-->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
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