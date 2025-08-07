<?php
// elevatorMode.php
// This script updates the elevator mode in the diagnosticsControl table of a MySQL database.

// Database connection
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'user',
    'password'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Check if elevatorMode is set in POST request
if (isset($_POST['elevatorMode'])) {
    $mode = $_POST['elevatorMode'];

    // Validate mode input
    $query = 'UPDATE diagnosticsControl
              SET elevatorMode = :mode
              WHERE nodeID = 0';

    $stmt = $db->prepare($query);
    $success = $stmt->execute([':mode' => $mode]);

    // Output success or failure message
    if ($success) {
        echo "Elevator mode set to $mode.";
    } else {
        echo "Failed to update elevator mode.";
    }
} else {    // Handle missing elevatorMode parameter
    echo "Missing elevatorMode.";
}
?>
