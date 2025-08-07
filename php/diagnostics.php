<?php
// diagnostics.php
// This script retrieves elevator diagnostics data from a MySQL database and outputs it as JSON.
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
    $stmtElevator = $db->prepare("SELECT floor1, floor2, floor3, status, messages FROM diagnosticsControl WHERE nodeID = :nodeID");
    $stmtElevator->execute(['nodeID' => 0]);
    $elevatorData = $stmtElevator->fetch();

    // Output result directly
    echo json_encode($elevatorData ?: []);

} catch (PDOException $e) { // Handle database connection errors
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
