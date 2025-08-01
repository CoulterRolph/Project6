<?php
header('Content-Type: application/json');

try {
    $db = new PDO(
        'mysql:host=127.0.0.1;dbname=elevatorCSD',
        'user',
        'password'
    );
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Query elevatorControl data
    $stmtElevator = $db->prepare("SELECT requestedFloor1, requestedFloor2, requestedFloor3, currentFloor, status, messages FROM elevatorControl WHERE nodeID = :nodeID");
    $stmtElevator->execute(['nodeID' => 0]);
    $elevatorData = $stmtElevator->fetch();

    // Merge both arrays into one response
    $response = array_merge($ledData ?: [], $elevatorData ?: []);
    echo json_encode($response);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
