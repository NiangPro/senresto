<div class="container col-md-4">
    <?php if($error): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?= $error ?>!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <h3>Connexion</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group mt-3">
                <label for="">Mot de passe <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="mdp">
            </div>
            <button type="submit" class="btn btn-warning mt-3" name="login">Se connecter</button>
        </form>
   
</div>