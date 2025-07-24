<?php
header('Content-Type: application/json');

$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'webadmin',
    'test'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$stmt = $db->query("SELECT elevatorMode FROM diagnosticsControl WHERE nodeID = 0 LIMIT 1");
$result = $stmt->fetch();

echo json_encode(['elevatorMode' => (int)$result['elevatorMode']]);
