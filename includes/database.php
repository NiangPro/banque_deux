<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=bank", "root", "");
} catch (PDOException $e) {
   die("Erreur : ".$e->getMessage());
}

function connecter($db, $email, $password)
{
    try {
        $req = $db->prepare("SELECT * FROM personne 
                            WHERE email =:email AND password =:password");

        $req->execute([
            'email' => $email,
            'password' => $password,
        ]);

        return $req->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function clients()
{
    global $db;
    try {
        $req = $db->prepare("SELECT * FROM personne 
                            WHERE email !=:email");

        $req->execute([
            'email' => "admin@gmail.com"
        ]);

        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}