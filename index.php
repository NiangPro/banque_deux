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

if (isset($_GET['ajoutCompte'])) {
   if (ajouterCompte($numCompte, $solde, $user)) {
        $_GET['page'] = "compte";
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
            case 'logout':
                    require_once("views/logout.php"); 
                    break;
            
            default:
                require_once("views/home.php"); 
                break;
        }
    }else{
        require_once("views/home.php"); 
    }
}else{
    require_once("views/login.php"); 
}

require_once("includes/footer.php"); 