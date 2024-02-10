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
            <tr class="">
              <th class="px-4 " scope="row">Lundi</th>
              <td class="px-4">09:00 - 12:00</td>
              <td class="px-4">14:00 - 18:00</td>
            </tr>
            <tr>
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
            </tr>
          </tbody>
        </table>
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