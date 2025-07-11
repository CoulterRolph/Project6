<?php
header('Content-Type: application/json');

$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'user',
    'password'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$stmt = $db->prepare("SELECT floor1LED, floor2LED, floor3LED FROM LEDControl WHERE nodeID = :nodeID");
$stmt->execute(['nodeID' => 0]);
$row = $stmt->fetch();

if ($row) {
    echo json_encode($row);
} else {
    echo json_encode([
        'error' => 'No data found',
        'floor1LED' => null,
        'floor2LED' => null,
        'floor3LED' => null
    ]);
}
?>
