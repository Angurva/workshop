<?php
$pageTitle = 'HomePage';
?>
<main class="container-fluid p-0 m-0">
    <section class="row p-0 m-0">
        <article class="col-sm-12 row justify-content-center mt-4">
            <div class="col-sm-12 col-lg-4 border rounded shadow me-4 servicing">
                <h4 class="m-3"><?php echo $services[0]['se_title']; //var_dump($services[0]["se_title"]); ?></h4>
                <p class="m-3"><?php echo $services[0]['se_description']; ?></p>
                <?php
                  if(isset($_SESSION['id']) && $_SESSION['role']== 1)
                  {
                ?>
                <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modal_mod_ent" id="btn_modal_ent">
                  Modifier
                </button>
                <?php
                }
                ?>
            </div>
            <div class="col-sm-12 col-lg-6 row">
                <div class="col-sm-12 border rounded shadow mb-4 servicing">
                    <h4 class="m-3"><?php echo $services[1]['se_title']; ?></h4>
                    <p class="m-3"><?php echo $services[1]['se_description']; ?> </p>
                    <?php
                      if(isset($_SESSION['id']) && $_SESSION['role']== 1)
                      {
                    ?>
                      <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modal_mod_mec" id="btn_modal_mec">
                        Modifier
                      </button>
                    <?php
                      }
                    ?>
                </div>
                <div class="col-sm-12 border rounded shadow servicing">
                    <h4 class="m-3"><?php echo $services[2]['se_title']; ?></h4>
                    <p class="m-3"><?php echo $services[2]['se_description']; ?></p>
                    <?php
                      if(isset($_SESSION['id']) && $_SESSION['role']== 1)
                      {
                    ?>
                      <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modal_mod_car" id="btn_modal_car">
                        Modifier
                      </button>
                    <?php
                      }
                    ?>
                </div>
            </div>
        </article>

        <aside class="col-sm-12 row justify-content-center">
        <div class="col-sm-12 col-lg-10 rounded shadow p-0 mt-4 opinions position-relative">

          <h5 class="text-center m-3"> Temoignages de nos clients </h5>

          <div class="row justify-content-around mx-0">
    
            <?php foreach($opinionsLimit as $opinion): ?>
            <div class="col-2 p-0 mb-3">
              <div class="card card-opinions">

                <div class="card-header d-inline">
                  <div> <?= $opinion['op_surname'] ?></div>
                  <div class="card-text"><span>
                    <?php for ($i=0;$i<$opinion['op_note'];$i++)
                    {
                        echo '⭐';
                    } ?>
                    </span>
                  </div>
                </div><!--card-header-->

                <div class="card-body">
                  

                  <div class="card-text">
                    <div><?= $opinion['op_comments'] ?></div>
                  </div><!--card-text-->

                </div><!--card-body-->

                <div class="card-footer">
                  <div> <?= $opinion['op_createAt'] ?></div>
                </div><!--card-footer-->

              </div><!--card-->
              
            </div>
            <?php endforeach ?>
           
           
          </div>
          <div class= "row justify-content-center">
            <button type="button" class="btn btn-outline-light col-sm-12 col-lg-1 m-3" data-bs-toggle="modal" data-bs-target="#modal_opinionslist" id="btn_modal_opinions">Voir plus </button>
          </div>
          <button type="button" class="btn btn-light rounded-pill  position-absolute top-50 start-100 translate-middle " data-bs-toggle="modal" data-bs-target="#modal_opinionadd" id="btn_modal_opinions">ajouter un avis </button>
      
        </div>
        
      </aside>  
    </section>
</main>


<?php
  if(isset($_SESSION['id']) && $_SESSION['role'] == 1)
  {
?>

<!--Modal Services "Entretien" editable-->
<div class="modal fade" id="modal_mod_ent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Texte à modifier</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="/services/update" method="POST">
            <input type="text" name="title" readonly value=<?php echo $services[0]['se_title']; ?> class="form-control">
            <textarea name="description" id="" cols="100" rows="10" class="form-control my-3"><?php echo $services[0]['se_description']; ?></textarea>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
    </div>
  </div>
</div>

<!--Modal Services Mecanique editable-->
<div class="modal fade" id="modal_mod_mec" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Texte à modifier</h4>
        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="/services/update" method="POST">
            <input type="text" name="title" readonly value=<?php echo $services[1]['se_title']; ?> class="form-control">
            <textarea name="description" id="" cols="100" rows="10" class="form-control my-3"><?php echo $services[1]['se_description']; ?></textarea>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
    </div>
  </div>
</div>

<!--Modal Services Carroserie editable-->
<div class="modal fade" id="modal_mod_car" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">

    
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tous les avis</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          
            <input type="text" name="title" readonly value=<?php echo $services[2]['se_title']; ?> class="form-control" >
            <textarea name="description" id="" cols="100" rows="10" class="form-control my-3"><?php echo $services[2]['se_description']; ?></textarea>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
          
        </div>
    </div>
  </div>
</div>
<?php
  }
?>

<!--Modal Opinions List-->
<div class="modal fade" id="modal_opinionslist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Tous les avis</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div><!-- modal header-->

      <div class="modal-body">
        <?php foreach($opinions as $opinion): ?>
          <div class="col-2 p-0 mb-3">
              <div class="card card-opinions-lg">

                <div class="card-header d-inline">
                  <div> <?= $opinion['op_surname'] ?></div>
                  <div class="card-text"><span>
                    <?php for ($i=0;$i<$opinion['op_note'];$i++)
                    {
                        echo '⭐';
                    } ?>
                    </span>
                  </div>
                </div><!--card-header-->

                <div class="card-body">
                  

                  <div class="card-text">
                    <div><?= $opinion['op_comments'] ?></div>
                  </div><!--card-text-->

                </div><!--card-body-->

                <div class="card-footer">
                  <div> <?= $opinion['op_createAt'] ?></div>
                </div><!--card-footer-->

              </div><!--card-->
              
            </div>
        <?php endforeach ?> 
      </div><!--model-body-->
            
       
    </div><!-- modal-content-->
  </div><!-- modal-dialog -->
</div>

<!--Modal create an opinion-->
<div class="modal fade" id="modal_opinionadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form action="/opinions/add" method="POST">
      <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Laisser votre avis</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div><!-- modal header-->

      <div class="modal-body">
     
        <div class="">
          <label for="op_surname" class="form-label">Surnom:</label>
          <input type="text" class="form-control" name="op_surname">
        </div>

        <div class="">
          <label for="op_note" class="form-label">Note:</label>
          <input type="text" inputmode="numeric" pattern="[0,5]{1}" class="form-control" name="op_note">
        </div><!--card-text-->
        
        <div class="mt-3">
          <textarea name="op_comments" id="op_comments"  rows="10" class="form-control" placeholder="commentaires" ></textarea> 
        </div><!--card-body-->

      </div><!--model-body-->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
    </form>
    </div><!-- modal-content-->
  </div><!-- modal-dialog -->
</div>