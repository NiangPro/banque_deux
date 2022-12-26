<div class="container mt-3">
    <div class="row">
        <div class="col-md-4 card">
            <div class="card-header text-white" style="background-color: #9A616D;">
                <div class="row">
                    <h5 class="col-md-12">Retrait</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Montant</label>
                        <input type="number"  step="5"  name="montant" class="form-control" min="500" required>
                    </div>
                    <button type="submit" name="retirer" class="btn btn-outline-success">Retirer</button>
                    <button type="reset" class="btn btn-outline-warning">Annuler</button>
                </form>
            </div>
        </div>
        <div class="ml-3 col-md-6 card">
            <div class="card-header text-white" style="background-color: #9A616D;">
                <div class="row">
                    <h5 class="col-md-12">Historiques des retraits</h5>
                </div>
            </div>
            <div class="card-body">
                <?php foreach($histos as $h): ?>
                    <?php if($h->type == "Retrait"): ?>
                        <div class="alert alert-dark" role="alert">
                            <?= date("d/m/Y", strtotime($h->dateOpt))." : ".$h->type." de ".$h->montant." F CFA" ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>