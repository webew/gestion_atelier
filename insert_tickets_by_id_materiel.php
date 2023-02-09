<?php

$cnx = new PDO("mysql:host=localhost;dbname=gestion_atelier;charset=utf8;port=3306", "toto", "toto");

var_dump($cnx);

$stmt_mat = $cnx->prepare("SELECT id_materiel FROM materiel");
$stmt_mat->execute();
$materiels = $stmt_mat->fetchAll(PDO::FETCH_ASSOC);
$mat_insert = array_rand($materiels, count($materiels) / 2);
// var_dump($mat_insert);
foreach ($mat_insert as $id_mat) {
    // $id_mat = $mat["id_materiel"] + 1;
    var_dump($id_mat);
    $nbTickets = rand(1, 10);
    for ($i = 1; $i <= $nbTickets; $i++) {
        $stmt = $cnx->prepare("CALL insert_ticket_by_materiel($id_mat)");
        $stmt->execute();
    }
}
