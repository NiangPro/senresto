<div class="container">
    <div class="card">
        <div class="card-header row">
            <h1 class="col-md-10">Formulaire d'<?= $_GET["type"] == "add" ? "ajout" : "édition" ?> chef</h1>
            <div class="col-md-2">
                <a href="?page=chefs" class="btn btn-info">Retour</a>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <span class="text-success">Tous les champs qui ont (<span class="text-danger">*</span>) sont obligatoires</span>
                
                <div class="form-group">
                    <label for="">Prenom <span class="text-danger">*</span></label>
                    <input type="text" value="<?= isset($c) ? $c->prenom : '' ?>" class="form-control" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="">Nom <span class="text-danger">*</span></label>
                    <input type="text" value="<?= isset($c) ? $c->nom : '' ?>" class="form-control" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="">Telephone <span class="text-danger">*</span></label>
                    <input type="text" value="<?= isset($c) ? $c->tel : '' ?>" class="form-control" name="tel" required>
                </div>
                <div class="form-group">
                    <label for="">Adresse <span class="text-danger">*</span></label>
                    <input type="text" value="<?= isset($c) ? $c->adresse : '' ?>" class="form-control" name="adresse" required>
                </div>
                <div class="form-group">
                    <label for="">Email <span class="text-danger">*</span></label>
                    <input type="email" value="<?= isset($c) ? $c->email : '' ?>" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">Image  <?php if($_GET["type"] == "add"): ?> <span class="text-danger">*</span><?php endif; ?></label>
                    <input type="file" class="form-control" name="image" <?= isset($c) ? "" : 'required'?> >
                </div>

                <?php if($_GET["type"] == "add"): ?>
                    <button type="submit" name="ajouter" class="btn mt-3 btn-outline-success">Ajouter</button>
                <?php else: ?>
                    <button type="submit" name="modifier" class="btn mt-3 btn-outline-warning">Modifier</button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>