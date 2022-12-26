<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #9A616D;">
  <a class="navbar-brand" href="#">Banque<span class="text-warning">Y</span>éwi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?page=home">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <?php if(estAdmin($user->email)):  ?>
      <li class="nav-item">
        <a class="nav-link" href="?page=compte">Comptes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=client">Clients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=historique">Transactions</a>
      </li>
      <?php else:  ?>
      <li class="nav-item">
        <a class="nav-link" href="?page=depot">Depôt</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=retrait">Retrait</a>
      </li>
      <?php endif;  ?>

      <li class="nav-item">
        <a class="nav-link" href="views/logout.php">Déconnexion</a>
      </li>
    </ul>
    
  </div>
</nav>