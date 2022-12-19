<?php
session_start();
$_SESSION['user'] = null;
$_GET = null;
return header("Location:/banque");
session_destroy();