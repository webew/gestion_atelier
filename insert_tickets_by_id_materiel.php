<?php

$cnx = new PDO("mysql:host=localhost;dbname=gestion_atelier;charset=utf8;port=3306","toto","toto");

var_dump($cnx);

$stmt_mat = $cnx->prepare("SELECT id_materiel FROM materiel");
$stmt_mat->execute();
$materiels = $stmt_mat->fetchAll(PDO::FETCH_ASSOC);
foreach($materiels as $mat){
    $id_mat = $mat["id_materiel"];
    // var_dump($id_mat);
    $stmt = $cnx->prepare("CALL insert_ticket_by_materiel($id_mat)");
    $stmt->execute();
}

