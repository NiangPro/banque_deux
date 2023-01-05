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

function myCompte($id){
    global $db;
    try {
        $req = $db->prepare("SELECT c.id as id,prenom, nom, numCompte,tel,adresse,idUser, solde 
        FROM compte c, personne p 
        WHERE c.iduser =:id AND p.id =:id");

        $req->execute([
            'id' => $id
        ]);

        return $req->fetch(PDO::FETCH_OBJ);
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

function deposer($idCompte, $montant)
{
    global $db;
    try {
        $req = $db->prepare("UPDATE compte set solde =:montant
        WHERE id = :id");

       return  $req->execute([
        'montant' => $montant,
        'id' => $idCompte,
       ]);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function historiques()
{
    global $db;
    try {
        $req = $db->prepare("SELECT prenom,montant, nom,type, dateOpt, numCompte,tel,adresse, solde 
        FROM compte c, personne p, historique h 
        WHERE h.idcompte = c.id AND h.iduser = p.id
        ORDER BY dateOpt DESC LIMIT 6");

        $req->execute();

        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function fondTotal(){
    global $db;
    try {
        $req = $db->prepare("SELECT SUM(solde) as somme FROM compte");

        $req->execute();

        return $req->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function totalTransaction($type){
    global $db;
    try {
        $req = $db->prepare("SELECT SUM(montant) as somme FROM historique
                WHERE type =:typeOp");

        $req->execute([
            'typeOp' => $type
        ]);

        return $req->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function allHistoriques($id)
{
    global $db;
    try {
        $req = $db->prepare("SELECT  prenom,montant, nom,type, dateOpt, numCompte,tel,adresse, solde 
        FROM compte c, personne p, historique h 
        WHERE  c.iduser = p.id AND h.iduser = p.id AND h.idCompte = c.id AND p.id = :id
        ORDER BY dateOpt DESC LIMIT 6");

        $req->execute([
            'id' => $id,
        ]);

        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function myHistoriques($id, $type)
{
    global $db;
    try {
        $req = $db->prepare("SELECT  prenom,montant, nom,type, dateOpt, numCompte,tel,adresse, solde 
        FROM compte c, personne p, historique h 
        WHERE (c.iduser = p.id AND h.iduser = p.id AND h.idCompte = c.id AND p.id = :id AND type =:typeOp)
        ORDER BY dateOpt DESC LIMIT 6");

        $req->execute([
            'id' => $id,
            'typeOp' => $type,
        ]);

        return $req->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : ".$e->getMessage());
    }
}

function ajouterHistorique($iduser, $montant, $idCompte, $type){
    global $db;
    try {
        $req = $db->prepare("INSERT INTO historique VALUES(null, :iduser, :type, :montant, :idCompte, :dateOpt)");
        return $req->execute([
            'type' => $type,
            'montant' => $montant,
            'dateOpt' => date("Y-m-d"),
            'iduser' => $iduser,
            'idCompte' => $idCompte,
        ]);
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