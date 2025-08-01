<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'user',
    'password'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if (isset($_POST['floorRequest'])) {
    $requestedFloor = intval($_POST['floorRequest']);

    // Get current floor
    $stmt = $db->prepare("SELECT currentFloor FROM elevatorControl WHERE nodeID = 0");
    $stmt->execute();
    $row = $stmt->fetch();

   try {
    $db->beginTransaction(); // Start transaction

    if ($row) {
        $currentFloor = intval($row['currentFloor']);

        if ($requestedFloor == $currentFloor) {
            echo "Elevator is already on floor $currentFloor.";
        } else {
            if (in_array($requestedFloor, [1, 2, 3])) {
                $column = "requestedFloor" . $requestedFloor;
                $sql = "UPDATE elevatorControl SET `$column` = 2 WHERE nodeID = 0";
                $update = $db->prepare($sql);
                $update->execute();

                
                if ($update->rowCount() === 0) {
                    throw new Exception("Update failed — no rows affected.");
                }

                $db->commit(); // Commit if successful
                echo "Elevator floor request set for floor $requestedFloor.";
                } else {
                    throw new Exception("Invalid floor request."); // Invalid floor value
                }
                }
       } else {
            throw new Exception("Node ID 0 not found in the database.");
        } 

    } catch (Exception $e) {
        $db->rollBack(); // Roll back on error
        echo "Transaction failed: " . $e->getMessage();
    }
} else {
    echo "No floorRequest received.";
}
?>
