<?php if (isset($_GET['type'])):  ?>
<div class="container mt-3 col-md-4 card">
    <div class="card-header text-white" style="background-color: #9A616D;">
        <div class="row">
            <h5 class="col-md-8">Ajout compte</h5>
            <div class="col-md-4 text-right">
                <a class="btn btn-info" href="?page=compte">retour</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="">N° compte</label>
                <input type="text"  name="numCompte" class="form-control" placeholder="Numero compte" required>
            </div>
            <div class="form-group">
                <label for="">Utilisateur</label>
                <select name="user" id="" class="form-control" required>
                    <option value="">Selectionner un client</option>
                    <?php foreach($clients as $c): ?>
                        <option value="<?= $c->id ?>"> <?= $c->prenom." ".$c->nom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Solde</label>
                <input type="number" value="15000" step="5"  name="solde" class="form-control" min="15000" required>
            </div>
            <button type="submit" name="ajoutCompte" class="btn btn-outline-success">Ajouter</button>
            <button type="reset" class="btn btn-outline-warning">Annuler</button>
        </form>
    </div>
</div>
<?php  else: ?>
<div class="container mt-2 card">
    <div class="card-header text-white" style="background-color: #9A616D;">
        <div class="row">
            <h5 class="col-md-8">Liste des comptes</h5>
            <div class="col-md-4 text-right">
                <a class="btn btn-success" href="?page=compte&type=ajout">Ajouter</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>N° compte</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Solde</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($comptes as $c): ?>
                <tr>
                    <td><?= $c->numCompte ?></td>
                    <td><?= $c->prenom ?></td>
                    <td><?= $c->nom ?></td>
                    <td><?= $c->tel ?></td>
                    <td><?= $c->adresse ?></td>
                    <td><?= $c->solde ?> FCFA</td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm rounded"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger btn-sm rounded"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php  endif; ?>