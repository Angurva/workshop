<?php
$pageTitle = 'HomePage';

//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_head.php');

//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_header.php');
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
        <div class="col-sm-12 col-lg-10 rounded shadow p-0 mt-4 opinions">
          <h5 class="text-center m-3"> Temoignages de nos clients </h5>
          <div class="row justify-content-around mx-0">
            <?php foreach($opinions as $opinion): ?>
            <div class="col-2 p-0">
              <div> <?= $opinion['op_surname'] ?></div>
              <div><span>
               <?php for ($i=0;$i<$opinion['op_note'];$i++)
               {
                  echo '⭐';
               } ?>
               </span>
               </div>
              <div><?= $opinion['op_comments'] ?></div>
            </div>
            <?php endforeach ?>
            <!--
            <div class="col-2">
              <div>Cunegonde <span>⭐⭐⭐⭐⭐⭐⭐</span></div>
              <div> Note:3/5 </div>
              <div>Commentaire : Natus quam reiciendis alias atque iure nihil</div>
            </div>
            <div class="col-2">
              <div>Bernadette <span>⭐⭐⭐⭐⭐</span></div>
              <div> Note:5/5 </div>
              <div>Commentaire :Vero quas minima esse non?</div>
            </div>
            <div class="col-2">
              <div>Martine <span>⭐⭐</span></div>
              <div> Note:2/5 </div>
              <div>Commentaire :Vero quas minima?</div>
            </div>
            <div class="col-2">
              <div>Pierrette <span>⭐⭐⭐⭐</span></div>
              <div> Note:4/5 </div>
              <div>Commentaire :Vgénial Natus quam reiciendis?</div>
            </div>
            -->
           
          </div>
        </div>
      </aside>
    </section>
</main>


<?php
  if(isset($_SESSION['id']) && $_SESSION['role']== 1)
  {
?>
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

<div class="modal fade" id="modal_mod_car" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="text" name="title" readonly value=<?php echo $services[2]['se_title']; ?> class="form-control" >
            <textarea name="description" id="" cols="100" rows="10" class="form-control my-3"><?php echo $services[2]['se_description']; ?></textarea>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
    </div>
  </div>
</div>
<?php
  }
?>
<?php
//require_once('..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_footer.php');
?>