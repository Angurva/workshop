<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'_head.php');
?>
<body>
    <main class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card m-auto" style="width: 25rem;">
            <form action="/connection/login" method="POST">
                <div class="card-header">
                    <h4 class="card-title text-center">Se connecter</h4>
                </div>
                <div class="card-body" >
                    <div class="m-3">
                        <label for="email" class="form-label">Identifiant</label>
                        <input type="email" placeholder="jdoe@exemple.fr" name="email" class="form-control" id="email">
                    </div>
                    <div class="m-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" class="form-control" aria-describedby="passwordHelpBlock" name="password">
                    </div>
                </div>

                <div class="card-footer">

                <button type="submit" class="btn btn-primary m-3" id="btn_connection">
                  se connecter
                </button>
                </div>
            </form>
        </div>
        </div>
    </main>
</body>
</html>