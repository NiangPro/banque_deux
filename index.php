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

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    require_once("includes/navbar.php"); 
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'compte':
                $clients = clients();
                require_once("views/compte.php"); 
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