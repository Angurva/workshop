<?php
 if(isset($_SESSION['id']) && $_SESSION['role']== 1)
 {
     
$pageTitle = 'management';
//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_head.php');

//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_header.php');
?>
<main class="container ms-auto">
        <div class="mx-0 my-4">
            <button type="button" class="btn btn-dark m-3" data-bs-toggle="modal" data-bs-target="#modal_newuser" id="btn_modal"> Nouvel Utilisateur
              <span class="fs-4 ms-auto"><i class="bi bi-person-add"></i></span>  
            </button>
            
        </div>
        <div class="row justify-content-center">
            
            <?php
                foreach($employees as $employee):
            ?>
            <div class="card h-100 col-sm-12 col-lg-3 p-0 mx-1 mb-2 card-users">
                <div class="card-body fs-5">
                    <div class="card-text">Id: <input type="hidden" name="<?php echo $employee['em_id'] ?> " class="border-0" readonly><?php echo $employee['em_id'] ?> </div>
                    <div class="card-title">Nom: <?php echo $employee['em_firstname'] ?></div>
                    <div class="card-subtitle">Prénom: <?php echo $employee['em_lastname'] ?> </div>
                    <div class="card-text">Email: <?php echo $employee['em_email'] ?></div>
                    <div class="card-text">Password :******</div>
                    <div class="card-text">Role: <?php echo $employee['ro_id'] ?></div>
                    <div class="card-text">créé le: <?php echo $employee['em_createAt'] ?></div>
                </div>
                <div class="card-footer d-flex justify-content-between ">
                    <form action="/management/delete" method="POST">
                        <input type="hidden" name="em_id" value="<?php echo $employee['em_id'] ?>">
                        <button type="submit" class="btn btn-lg btn-outline-primary">
                            <span><i class="bi bi-trash3"></i></span>
                        </button>
                        
                    </form>
                   <form action="/management-update" method="POST">
                      <input type="hidden" name="em_id" value="<?php echo $employee['em_id'] ?>">
                        <button type="submit" class="btn btn-lg btn-outline-primary">
                            <span><i class="bi bi-pencil-square"></i></span>
                        </button>
                   </form>
                </div>
            </div>
           
            <?php  endforeach; ?>
        </div>
    </main>


<div class="modal fade" id="modal_newuser" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ModalLabel">Nouvel Utilisateur</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="/management/add" method="POST">
            <div>
                <label for="em_firstname" class="form-label">Prénom: </label>
                <input type="text" name="em_firstname" id="em_firstname" class="form-control" required>
            </div>
          
            <div>
                <label for="em_lastname" class="form-label">Nom: </label>
                <input type="text" name="em_lastname" id="em_lastname" class="form-control" required>    
            </div>
            
            <div>
                <label for="em_email" class="form-label">Email: </label>
                <input type="email" name="em_email" id="em_email" class="form-control" required>
            </div>
            
            <div>
                <label for="em_password" class="form-label">Mot de passe: </label>
                <input type="password" name="em_password" id="em_password" class="form-control" required>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            
          </form>
        </div>
    </div>
  </div>
</div>
<?php
}
else{
  header('Location: /404');
}
?>
