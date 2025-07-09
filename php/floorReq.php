<?php
// Connect to the database
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'root',
    ''
);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get floorRequest from POST
if (isset($_POST['floorRequest'])) {
    $requestedFloor = intval($_POST['floorRequest']);

    // Get the current floor from the table
    $stmt = $db->prepare("SELECT location FROM elevatorControl WHERE nodeID = 0");
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row) {
        $currentFloor = intval($row['currentFloor']);

        // Check if requested floor is same as current
        if ($requestedFloor == $currentFloor) {
            // Already on current floor - in the future you'd update status instead
            echo "Elevator is already on floor $currentFloor.";
        } else {
            // Update location column of the requested floor to 2 (request)
            $update = $db->prepare("UPDATE elevatorControl SET location = 2 WHERE nodeID = 0 AND location = :floor");
            $update->execute([':floor' => $requestedFloor]);

            echo "Elevator requested to floor $requestedFloor.";
        }
    } else {
        echo "Node ID 0 not found in the database.";
    }
} else {
    echo "No floorRequest received.";
}
?>
