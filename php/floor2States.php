<?php
// floor2States.php
// This script retrieves the current floor state and request status for the elevator from a MySQL database and outputs it as JSON.
header('Content-Type: application/json');

// Database connection
try {
    $db = new PDO(
        'mysql:host=127.0.0.1;dbname=elevatorCSD',
        'user',
        'password'
    );
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Get currentFloor from elevatorControl where nodeID = 0
    $stmtElevator = $db->prepare("SELECT currentFloor FROM elevatorControl WHERE nodeID = :nodeID");
    $stmtElevator->execute(['nodeID' => 0]);
    $elevatorData = $stmtElevator->fetch();

    // Get status, messages, and floorRequest from floorControl where nodeID = 2
    $stmtFloor = $db->prepare("SELECT status, messages, floorRequest FROM floorControl WHERE nodeID = :nodeID");
    $stmtFloor->execute(['nodeID' => 2]);
    $floorData = $stmtFloor->fetch();

    // Merge and return
    $response = array_merge($elevatorData ?: [], $floorData ?: []);
    echo json_encode($response);

} catch (PDOException $e) { // Handle database connection errors    
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
