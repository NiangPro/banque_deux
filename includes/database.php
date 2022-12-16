<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=bank", "root", "");
} catch (PDOException $e) {
   die("Erreur : ".$e->getMessage());
}