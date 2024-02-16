<main class="container">
    <article>
        <table class="table table-light table-striped text-center mt-5 table-bordered border">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Sujet</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Validation</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($co_pending as $pending):
                ?>
               
                <tr>
                    <th scope="row"> <?php echo $pending['co_id'] ?></th>
                    <td><?php echo $pending['co_firstname'] ?></td>
                    <td><?php echo $pending['co_lastname'] ?></td>
                    <td><?php echo $pending['co_email'] ?></td>
                    <td><?php echo $pending['co_phone'] ?></td>
                    <td><?php echo $pending['co_subject'] ?></td>
                    <td><?php echo $pending['co_description'] ?></td>
                    <td><?php echo $pending['co_status'] ?></td>
                    <td><form action="/contacts-validate" method="POST"><input type="hidden" name="co_id" value=<?php echo $pending['co_id']?> > <button type="submit" class="btn btn-outline-success ms-auto">Validé</button></form></td>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </article>
</main>
