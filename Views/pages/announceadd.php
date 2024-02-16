<?php

//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_head.php');

//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_header.php');
if(isset($_SESSION['id']) && ($_SESSION['role']== 1 || $_SESSION['role']== 2 || $_SESSION['role']== 3))
{
?>

<main class="container">
    <div class="border rounded shadow m-3 p-3 announce-add" style="background-color: #E3E6E0;">
        <h2 class="text-center mt-3">Ajout d'une annonce</h2>
        <form action="/announces-add" method="POST" class="mt-5">
            <section class="row">
                <article class="col-sm-12 col-lg-6 row">
                    <h4 class="text-center">Informations du véhicule</h4>
                    <div class="col-lg-6 mt-3">
                        <label for="models" class="form-label">Modèle : </label>
                        <select name="models" id="models" class="form-select text-center">
                            <?php foreach ($models as $model): ?>
                            <option value="<?php $model['mo_name']; ?> "><?php echo $model['mo_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="energies"class="form-label">Energie</label>
                        <select name="energies" id="energies" class="form-select text-center">
                            <?php foreach ($energies as $energy): ?>
                            <option value="<?php echo $energy['en_name']; ?> "><?php echo $energy['en_name']; ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="ve_year" class="form-label">Année:</label>
                        <input type="text" class="form-control" name="ve_year">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="ve_price" class="form-label">Prix: </label>
                        <input type="text" class="form-control" name="ve_price">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="ve_km" class="form-label">Kilomètres: </label>
                        <input type="text" class="form-control" name="ve_km">
                    </div>
                
                    <div class="col-lg-6 mt-3">
                        <label for="ve_color" class="form-label">Couleur:</label>
                        <input type="text" class="form-control" name="ve_color">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="ve_doors" class="form-label">Nombre de portes:</label>
                        <input type="text" class="form-control" name="ve_doors">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="form-label">Photo vitrine</label>
                        <input type="file" class="form-control" name="ve_photo">
                    </div>
                </article>

                <article class="col-sm-12 col-lg-6 ms-3 row ">
                    <h4 class="text-center">Options & Equipements</h4>
                    <?php foreach($equipments as $equipment): ?>
                    <div class="form-check col-lg-6 mx-auto mt-4">
                        <input class="form-check-input" type="checkbox" value="<?php $equipment['eq_id'] ?>" name="eq_id">
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

<?php
}
//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_footer.php');
?>



