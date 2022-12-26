<div class="container mt-4">
    <div class="row">
        <div class="col-md-7 card">
            <div class="card-header text-white" style="background-color: #9A616D;">
                <h5>Information du Compte</h5>
            </div>
            <div class="card-body">
                <?php if(estAdmin($user->email)): ?>
                    <div class="row">
                        <div class="alert alert-success col-md-5" role="alert">
                            <h3>Depôt Total</h3>
                            <h1><?= $depot->somme ?> FCFA</h1>
                        </div>
                        <div class="alert alert-warning col-md-5 ml-2" role="alert">
                            <h3>Retrait Total</h3>
                            <h1><?= $retrait->somme ?> FCFA</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="alert alert-info col" role="alert">
                            <h3>CAISSE</h3>
                            <h1><?= $total->somme ?> FCFA</h1>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if(isset($cpt)): ?>
                        <table>
                        <tr><td colspan="2"><h3>Information Personnelle</h3></td></tr>
                    <tr><th>Prénom : </th><td><?= ucfirst($cpt->prenom) ?></td></tr>
                        <tr><th>Nom : </th><td><?= ucfirst($cpt->nom) ?></td></tr>
                        <tr><th>Adresse : </th><td><?= ucfirst($cpt->adresse) ?></td></tr>
                        <tr><th>Telephone : </th><td><?= ucfirst($cpt->tel) ?></td></tr>
                        <tr><td colspan="2"><h3>Information du compte</h3></td></tr>
                        <tr><th>N°compte : </th><td><?= ucfirst($cpt->numCompte) ?></td></tr>
                        <tr><th>Solde: </th><td><?= ucfirst($cpt->solde)." F CFA" ?></td></tr>

                    </table>
                    <?php else: ?>
                        <div class="alert alert-info">Vous n'avez pas de compte pour le moment</div>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-4 card ml-1">
            <div class="card-header text-white" style="background-color: #9A616D;">
                <h5>Historiques des transactions</h5>
            </div>
            <div class="card-body">
            <?php foreach($histos as $h): ?>
                    <div class="alert alert-dark" role="alert">
                        <?= date("d/m/Y", strtotime($h->dateOpt))." : ".$h->type." de ".$h->montant." F CFA" ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
