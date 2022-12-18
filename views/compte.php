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
                <label for="">Utilisateur</label>
                <select name="user" id="" class="form-control">
                    <option value="">Selectionner un client</option>
                    <?php foreach($clients as $c): ?>
                        <option value="<?= $c->id ?>"> <?= $c->prenom." ".$c->nom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
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
                <tr>
                    <td>compte2345</td>
                    <td>Bass</td>
                    <td>Bass</td>
                    <td>Bass</td>
                    <td>Bass</td>
                    <td>Bass</td>
                    <td>Bass</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php  endif; ?>