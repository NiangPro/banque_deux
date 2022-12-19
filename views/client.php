<?php if (isset($_GET['type'])):  ?>
<div class="container mt-3 col-md-5 card">
    <div class="card-header text-white" style="background-color: #9A616D;">
        <div class="row">
            <h5 class="col-md-8">Ajout client</h5>
            <div class="col-md-4 text-right">
                <a class="btn btn-info" href="?page=client">retour</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Prénom</label>
                <input type="text"  name="prenom" class="form-control" placeholder="Prénom" required>
            </div>
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text"  name="nom" class="form-control" placeholder="nom" required>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="">Telephone</label>
                    <input type="text"  name="tel" class="form-control" placeholder="Telephone" required>
                </div>
                <div class="form-group col">
                    <label for="">Adresse</label>
                    <input type="text"  name="adresse" class="form-control" placeholder="Adresse" required>
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="">Email</label>
                    <input type="email"  name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group col">
                    <label for="">Mot de passe</label>
                    <input type="password"  name="password" class="form-control" placeholder="Mot de passe" required>
                </div>

            </div>
            <button type="submit" name="ajoutClient" class="btn btn-outline-success">Ajouter</button>
            <button type="reset" class="btn btn-outline-warning">Annuler</button>
        </form>
    </div>
</div>
<?php  else: ?>
<div class="container mt-2 card">
    <div class="card-header text-white" style="background-color: #9A616D;">
        <div class="row">
            <h5 class="col-md-8">Liste des clients</h5>
            <div class="col-md-4 text-right">
                <a class="btn btn-success" href="?page=client&type=ajout">Ajouter</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clients as $c): ?>
                <tr>
                    <td><?= $c->prenom ?></td>
                    <td><?= $c->nom ?></td>
                    <td><?= $c->tel ?></td>
                    <td><?= $c->adresse ?></td>
                    <td><?= $c->email ?></td>
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