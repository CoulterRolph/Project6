<?php
// floorLEDStates.php
// This script retrieves the LED states for each floor and the elevator's current state from a MySQL database and outputs it as JSON.
header('Content-Type: application/json');

// Database connection
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

} catch (PDOException $e) { // Handle database connection errors
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
