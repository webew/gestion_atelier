<?php

$cnx = new PDO("mysql:host=localhost;dbname=gestion_atelier;charset=utf8;port=3306", "toto", "toto");

var_dump($cnx);

$stmt_cli = $cnx->prepare("SELECT id_client FROM client");
$stmt_cli->execute();
$clients = $stmt_cli->fetchAll(PDO::FETCH_ASSOC);
// var_dump($clients);
foreach ($clients as $client) {
    $id_cli = $client["id_client"];
    var_dump($id_cli);
    $nbTickets = rand(2, 10);
    for ($i = 1; $i <= $nbTickets; $i++) {
        $stmt = $cnx->prepare("CALL insert_ticket_by_client($id_cli)");
        $stmt->execute();
    }
}
