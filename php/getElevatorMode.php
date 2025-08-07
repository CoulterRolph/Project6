<?php
// getElevatorMode.php
// This script retrieves the current elevator mode from the diagnosticsControl table in a MySQL database and outputs it as JSON.
header('Content-Type: application/json');

// Database connection
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'user',
    'password'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Query to get the elevator mode
$stmt = $db->query("SELECT elevatorMode FROM diagnosticsControl WHERE nodeID = 0 LIMIT 1");
$result = $stmt->fetch();

// Check if the result is not empty and output the elevator mode
echo json_encode(['elevatorMode' => (int)$result['elevatorMode']]);
