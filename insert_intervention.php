<?php

$cnx = new PDO("mysql:host=localhost;dbname=gestion_atelier;charset=utf8;port=3306","toto","toto");

var_dump($cnx);

$stmt_tic = $cnx->prepare("SELECT id_ticket FROM ticket");
$stmt_tic->execute();
$tickets = $stmt_tic->fetchAll(PDO::FETCH_ASSOC);
$stmt_tech = $cnx->prepare("SELECT id_technicien FROM technicien");
$stmt_tech->execute();
$techniciens = $stmt_tech->fetchAll(PDO::FETCH_ASSOC);
$stmt_statut = $cnx->prepare("SELECT id_statut FROM statut");
$stmt_statut->execute();
$statuts = $stmt_statut->fetchAll(PDO::FETCH_ASSOC);
foreach($tickets as $ticket){
    $nbInterventions = rand(2,10);
    for($i=1;$i <= $nbInterventions;$i++){
        $id_tic = $ticket["id_ticket"];
        $randTech = array_rand($techniciens);
        $randStatut = array_rand($statuts);
        $stmt = $cnx->prepare("CALL insert_interventions_by_ticket_technicien_statut($id_tic,$randTech,$randStatut)");
        $stmt->execute();
    }
}

