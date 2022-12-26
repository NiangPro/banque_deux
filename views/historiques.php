<div class="container mt-2 card">
    <div class="card-header text-white" style="background-color: #9A616D;">
        <div class="row">
            <h5 class="col-md-8">Liste des transactions</h5>
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
                    <th>Type</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($histos as $c): ?>
                <tr>
                    <td><?= $c->numCompte ?></td>
                    <td><?= $c->prenom ?></td>
                    <td><?= $c->nom ?></td>
                    <td><?= $c->tel ?></td>
                    <td><?= $c->adresse ?></td>
                    <td><?= $c->type ?></td>
                    <td><?= $c->montant ?> FCFA</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>