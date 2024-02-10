<?php

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_head.php');

require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_header.php');
?>
<main class="container ms-auto">
        <div class="mx-0 my-4">
            <button type="button" class="btn btn-dark"> Nouvel Utilisateur
              <span class="fs-4 ms-auto"><i class="bi bi-person-add"></i></span>  
            </button>
        </div>
        <div class="row justify-content-center">
            
            <?php
                foreach($employees as $employee):
            ?>
            <div class="card h-100 col-sm-12 col-lg-3 p-0 mx-1 mb-2">
                <div class="card-body fs-5">
                    <div class="card-title">Nom: <?php echo $employee['em_firstname'] ?></div>
                    <div class="card-subtitle">Prénom: <?php echo $employee['em_lastname'] ?> </div>
                    <div class="card-text">Email: <?php echo $employee['em_email'] ?></div>
                    <div class="card-text">Password : <?php echo $employee['em_password'] ?></div>
                    <div class="card-text">Role: <?php echo $employee['ro_id'] ?></div>
                    <div class="card-text">créé le: <?php echo $employee['em_createAt'] ?></div>
                </div>
                <div class="card-footer d-flex justify-content-between ">
                    <div class="fs-2"><a href="#"><i class="bi bi-trash3"></i></a></div>
                    <div class="fs-2"><a href="#"><i class="bi bi-pencil-square"></i></a></div>
                </div>
            </div>
            <?php  endforeach; ?>
        </div>
    </main>

<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_footer.php');
?>