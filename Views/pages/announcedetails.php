
<main class="container">
    <article class="row justify-content-center m-3">
        <h1 class="text-center border m-3 opt_equip"><?= $announce['ve_designation'] . " ". $announce['br_name'] ." ". $announce['mo_name'] ?></h1>
        <section class="col-sm-12 col-lg-12" id="carousel-img">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                    <img src="<?= $announce['ve_photo'] ?>" class="img-fluid w-75" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>


        <section  class="col-sm-12 col-lg-12 border my-2 row opt_equip">
            <div class="col-sm-12 col-lg-6">
                <div ><span class="fs-2 fw-semibold ">Marque : </span><span class="fs-4"><?= $announce['br_name'] ?></span></div>
                <div><span class="fs-2 fw-semibold ">Modèle : </span><span class="fs-4"><?= $announce['mo_name'] ?></span></div>
                <div><span class="fs-2 fw-semibold ">Année : </span><span class="fs-4"><?= $announce['ve_year'] ?></span></div>
                <div><span class="fs-2 fw-semibold ">Energie : </span><span class="fs-4"><?= $announce['en_name'] ?></span></div>
                <div><span class="fs-2 fw-semibold ">Kilomètrage : </span><span class="fs-4"><?= $announce['ve_km'] ?> km</span></div>
                <div><span class="fs-2 fw-semibold ">Couleur : </span><span class="fs-4"><?= $announce['ve_color'] ?></span></div>
                <div><span class="fs-2 fw-semibold ">Nombre de portes : </span><span class="fs-4"><?= $announce['ve_doors'] ?></span></div>


            </div>
            <div class="col-sm-12 col-lg-6 ">
                <h2>Options & Equipements</h2>
                <ul>
                    <?php foreach($equipments as $equipment): ?>
                    
                    <li class="fs-3 fw-semibold "><?= $equipment["eq_name"] ?></li>
                    <?php endforeach ?>    
                </ul>
            </div>




        </section>

    </article>
</main>