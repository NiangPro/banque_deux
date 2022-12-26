<?php  

session_start();

require_once("includes/header.php"); 
require_once("includes/database.php"); 

if (isset($_POST['connecter'])) {
    extract($_POST);

    $user = connecter($db, $email, $password);

    if ($user) {
        $_SESSION['user'] = $user;
    }else{
        
    }
}

if (isset($_POST['ajoutCompte'])) {
    extract($_POST);
   if (ajouterCompte($numCompte, $solde, $user)) {
       return header("Location:?page=compte");
   }else{
    die("erreur");
   }
}

if (isset($_POST['deposer'])) {
    extract($_POST);
    $cpt = myCompte($_SESSION['user']->id);
    $mt = $cpt->solde + floatval($montant);
   if (deposer($cpt->id, $mt)) {
       ajouterHistorique($cpt->idUser, floatval($montant), $cpt->id, "Depot");
   }else{
    die("erreur");
   }
}

if (isset($_POST['retirer'])) {
    extract($_POST);
    $cpt = myCompte($_SESSION['user']->id);
    $mt = $cpt->solde - floatval($montant);
   if (deposer($cpt->id, $mt)) {
       ajouterHistorique($cpt->idUser, floatval($montant), $cpt->id, "Retrait");
   }else{
    die("erreur");
   }
}

if (isset($_POST['ajoutClient'])) {
    extract($_POST);
   if (ajouterClient($prenom, $nom, $tel, $email, $password, $adresse)) {
       return header("Location:?page=client");
   }else{
    die("erreur");
   }
}

if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
    $user = $_SESSION['user'];
    require_once("includes/navbar.php"); 
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'compte':
                $clients = clients();
                $comptes = comptes();
                require_once("views/compte.php"); 
                break;
            case 'home':
                $cpt = myCompte($user->id);
                $total = fondTotal();
                $retrait = totalTransaction("Retrait");
                $depot = totalTransaction("Depot");
                $histos = estAdmin($_SESSION['user']->email) ? historiques(): allHistoriques($_SESSION['user']->id);
                require_once("views/home.php"); 
                break;
            case 'historique':
                $histos = historiques();
                require_once("views/historiques.php"); 
                break;
            case 'client':
                    $clients = clients();
                    require_once("views/client.php"); 
                    break;
            case 'client':
                $clients = clients();
                require_once("views/historiques.php"); 
                break;
            case 'depot':
                $histos = myHistoriques($_SESSION['user']->id, "Depot");
                    require_once("views/depot.php"); 
                    break;
            case 'retrait':
                $histos = myHistoriques($_SESSION['user']->id, "Retrait");
                require_once("views/retrait.php"); 
                break;
            case 'logout':
                    require_once("views/logout.php"); 
                    break;
            
            default:
                $cpt = myCompte($user->id);
                $histos = estAdmin($_SESSION['user']->email) ? historiques(): allHistoriques($_SESSION['user']->id);
                $total = fondTotal();
                $retrait = totalTransaction("Retrait");
                $depot = totalTransaction("Depot");
                require_once("views/home.php"); 
                break;
        }
    }else{
        $cpt = myCompte($user->id);
        $histos = estAdmin($_SESSION['user']->email) ? historiques(): allHistoriques($_SESSION['user']->id);
        $total = fondTotal();
                $retrait = totalTransaction("Retrait");
                $depot = totalTransaction("Depot");
        require_once("views/home.php"); 
    }
}else{
    require_once("views/login.php"); 
}

require_once("includes/footer.php"); 