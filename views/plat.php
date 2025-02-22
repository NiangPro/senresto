<div class="container">
    <div class="card">
        <div class="card-header row">
            <h1 class="col-md-10">La liste des plats</h1>
            <div class="col-md-2">
                <a href="?page=plats&type=add" class="btn btn-success">Ajouter</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($plats as $p): ?>
                        <tr>
                            
                        <td>
                            <img width="50" height="50" src="images/<?= $p->image ?>" alt="">
                        </td>
                        <td><?= $p->nom ?></td>
                        <td><?= $p->prix ?> FCFA</td>
                        <td><?= $p->description ?></td>
                        <td><?= $p->nomcategorie ?></td>
                        <td>
                            <a href="?page=plats&type=edit&id=<?= $p->id ?>" class="btn btn-info btn-sm"><i class="ti ti-edit"></i></a>
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal<?= $p->id ?>" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?= $p->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Non</button>
                                    <a href="?page=plats&idDeleting=<?= $p->id ?>"  class="btn btn-danger">Oui</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>