
<main class="container d-flex justify-content-center">
    <div class="card">
        <form action="/management/update" method="POST">
            <div class="card-header">Id:<?php echo $employee['em_id'] ?></div>
            <input type="hidden" name="em_id" value="<?php echo $employee['em_id'] ?>">
            <div class="card-body">
                <div class="card-title">Nom: <input type="text" name="em_firstname" value=<?php echo $employee['em_firstname'] ?>></div>
                <div class="card-subtitle">Prénom:<input type="text" name="em_lastname" value=<?php echo $employee['em_lastname'] ?> ></div>
                <div class="card-text">Email: <input type="email" name="em_email" value=<?php echo $employee['em_email'] ?>></div>
                <div class="card-text">Password : <input type="password" name="em_password" value=<?php echo $employee['em_password'] ?>></div>
                <div class="card-text">Role: <input type="text" name="ro_id" value=<?php echo $employee['ro_id'] ?>></div>
                <div class="card-text">créé le: <?php echo $employee['em_createAt'] ?>></div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/management'">Cancel</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</main>

