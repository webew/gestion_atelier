<?php

$cnx = new PDO("mysql:host=localhost;dbname=gestion_atelier;charset=utf8;port=3306", "toto", "toto");

var_dump($cnx);

$stmt_inter = $cnx->prepare("SELECT id_intervention FROM intervention");
$stmt_inter->execute();
$interventions = $stmt_inter->fetchAll(PDO::FETCH_ASSOC);
// var_dump($interventions);
$interRand = array_rand($interventions, floor(count($interventions) / 3));
// var_dump($interRand);

$stmt_piece = $cnx->prepare("SELECT id_piece FROM piece");
$stmt_piece->execute();
$pieces = $stmt_piece->fetchAll(PDO::FETCH_ASSOC);
var_dump($pieces);

foreach ($interRand as $inter) {
    $id_piece = $pieces[array_rand($pieces)]["id_piece"];
    $id_inter = $interventions[$inter]["id_intervention"];
    $stmt_utiliser = $cnx->prepare("INSERT INTO utiliser VALUES($id_piece,$id_inter)");
    var_dump($stmt_utiliser);
    $stmt_utiliser->execute();
}
