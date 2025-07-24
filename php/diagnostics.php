<?php
header('Content-Type: application/json');

try {
    $db = new PDO(
        'mysql:host=127.0.0.1;dbname=elevatorCSD',
        'webadmin',
        'test'
    );
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Query elevatorControl data
    $stmtElevator = $db->prepare("SELECT floor1, floor2, floor3, status, messages FROM diagnosticsControl WHERE nodeID = :nodeID");
    $stmtElevator->execute(['nodeID' => 0]);
    $elevatorData = $stmtElevator->fetch();

    // Output result directly
    echo json_encode($elevatorData ?: []);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
