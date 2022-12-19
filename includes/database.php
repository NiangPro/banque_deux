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

function historiques()
{
    global $db;
    try {
        $req = $db->prepare("SELECT * FROM historique 
                            WHERE email !=:email");

        $req->execute([
            'email' => "admin@gmail.com"
        ]);

        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function comptes()
{
    global $db;
    try {
        $req = $db->prepare("SELECT prenom, nom, numCompte,tel,adresse, solde 
        FROM compte c, personne p 
        WHERE c.idUser = p.id
        ORDER BY numCompte ASC");

        $req->execute();

        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function ajouterCompte($numCompte, $solde, $idUser){
    global $db;
    try {
        $req = $db->prepare("INSERT INTO compte VALUES(null, :numCompte, :solde, :statut, :idUser)");
        return $req->execute([
            'numCompte' => $numCompte,
            'solde' => $solde,
            'statut' => 1,
            'idUser' => $idUser
        ]);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function ajouterClient($prenom, $nom, $tel, $email, $password, $adresse){
    global $db;
    try {
        $req = $db->prepare("INSERT INTO personne VALUES(null, :prenom, :nom, :tel, :email, :mdp, :adresse)");
        return $req->execute([
            'prenom' => $prenom,
            'nom' => $nom,
            'tel' => $tel,
            'email' => $email,
            'mdp' => $password,
            'adresse' => $adresse,
        ]);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function estAdmin($email){
    return $email === "admin@gmail.com";
}