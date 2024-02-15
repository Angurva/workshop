<?php

//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_head.php');

//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_header.php');
?>

<main class="container">
    <article class="row">
        <form action="/announces-add" method="POST">
            <label for="brand">Marque</label>
            <label for="models">Modèle</label>
            <select name="models" id="models">
                <?php foreach ($models as $model): ?>
                <option value="<?php $model['mo_name']; ?> "><?php echo $model['mo_name']; ?></option>
                <?php endforeach ?>
            </select>
            <label for="energies">Energie</label>
            <select name="energies" id="energies">
                <?php foreach ($energies as $energy): ?>
                <option value="<?php echo $energy['en_name']; ?> "><?php echo $energy['en_name']; ?> </option>
                <?php endforeach ?>
            </select>
            <div>
                <label for="ve_price">Prix: </label>
                <input type="text" class="form-control" name="ve_price">
            </div>
            <div>
                <label for="ve_km">Kilomètres: </label>
                <input type="text" class="form-control" name="ve_km">
            </div>
            <div>
                <label for="ve_year">Année:</label>
                <input type="text" class="form-control" name="ve_year">
            </div>
            <div>
                <label for="ve_color">Couleur:</label>
                <input type="text" class="form-control" name="ve_color">
            </div>
            <div>
                <label for="ve_doors">Nombre de portes:</label>
                <input type="text" class="form-control" name="ve_doors">
            </div>
            <div>
                <label for="">Photo vitrine</label>
                <input type="file" class="form-control" name="ve_photo">
            </div>
            <?php foreach($equipments as $equipment): ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php $equipment['eq_id'] ?>" name="eq_id">
                <label class="form-check-label" for="eq_name"><?php echo $equipment['eq_name'] ?></label>
            </div>
            <?php endforeach ?>

        </form>
    </article>
</main>

<?php
//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_footer.php');
?>



