<?php

if(isset($_SESSION['id']) && ($_SESSION['role']== 1 || $_SESSION['role']== 2 || $_SESSION['role']== 3))
{
?>

<main class="container">
    <div class="border rounded shadow m-3 p-3 announce-add" style="background-color: #E3E6E0;">
        <h2 class="text-center mt-3">Ajouter une annonce</h2>
        <form action="/announces/create" method="POST" class="mt-5" enctype="multipart/form-data">
            <section class="row">
                <article class="col-sm-12 col-lg-6 row">
                    <h4 class="text-center">Informations du véhicule :</h4>
                    <div class="col-lg-12 mt-3">
                        <label for="ve_designation" class="form-label">Désignation:</label>
                        <input type="text" class="form-control" name="ve_designation">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="models" class="form-label">Modèle : </label>
                        <button type="button" class="btn btn-dark btn-sm " data-bs-toggle="modal" data-bs-target="#modal_br_mo" id="btn_modal_br_mo">+</button>
                        <select name="mo_name" id="models" class="form-select text-center">
                            <?php foreach ($models as $model): ?>
                            <option value="<?php echo $model['mo_name']; ?>"><?php echo $model['mo_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="energies"class="form-label">Energie :</label>
                        <select name="en_name" id="energies" class="form-select text-center">
                            <?php foreach ($energies as $energy): ?>
                            <option value="<?php echo $energy['en_name']; ?>"><?php echo $energy['en_name']; ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="ve_year" class="form-label">Année :</label>
                        <input type="text" class="form-control" name="ve_year">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="ve_price" class="form-label">Prix : </label>
                        <input type="text" class="form-control" name="ve_price">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="ve_km" class="form-label">Kilomètres : </label>
                        <input type="text" class="form-control" name="ve_km">
                    </div>
                
                    <div class="col-lg-6 mt-3">
                        <label for="ve_color" class="form-label">Couleur :</label>
                        <input type="text" class="form-control" name="ve_color">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="ve_doors" class="form-label">Nombre de portes :</label>
                        <input type="text" class="form-control" name="ve_doors">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="form-label">Photo vitrine : </label>
                        <input type="file" class="form-control" name="ve_photo">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="form-label">Photos supplémentaires : </label>
                        <input type="file" class="form-control" name="images[]" multiple>
                    </div>
                </article>

                <article class="col-sm-12 col-lg-6 ms-3 row ">
                    <h4 class="text-center">Options & Equipements</h4>
                    <?php foreach($equipments as $equipment): ?>
                    <div class="form-check col-lg-6 mx-auto mt-4">
                        <input class="form-check-input" type="checkbox" value="<?php echo $equipment['eq_id'] ?>" name="eq_id[]">
                        <label class="form-check-label" for="eq_name"><?php echo $equipment['eq_name'] ?></label>
                    </div>
                    <?php endforeach ?>
                </article>
            </section>
            <div class="d-flex justify-content-end ">
                <button type="submit" class="btn btn-primary ms-auto my-3 me-3">validation</button>
            </div>
            
        </form>    

    </div>
    
</main>
<div class="modal fade" id="modal_br_mo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form action="/announces/add-model" method="POST">
      <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Ajouter un modèle et une marque</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div><!-- modal header-->

      <div class="modal-body">
     
        <div class="">
          <label for="op_surname" class="form-label">Marque:</label>
          <input type="text" class="form-control" name="br_name">
        </div>

        <div class="">
          <label for="op_note" class="form-label">Modèles:</label>
          <input type="text" class="form-control" name="mo_name">
        </div><!--card-text-->

      </div><!--model-body-->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
    </form>
    </div><!-- modal-content-->
  </div><!-- modal-dialog -->
</div>

<?php
}
?>



