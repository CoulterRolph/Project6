<?php
// elevatorReq.php
// This script updates the floor request for an elevator in a MySQL database based on POST parameters.

// Database connection
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'user',
    'password'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Check if expected POST values are set
if (isset($_POST['nodeID']) && isset($_POST['floorRequest'])) {
    $nodeID = $_POST['nodeID'];
    $floorRequest = $_POST['floorRequest'];

    // Validate floorRequest input
    $query = 'UPDATE floorControl
              SET floorRequest = :floorRequest
              WHERE nodeID = :nodeID';

    $stmt = $db->prepare($query);
    $success = $stmt->execute([
        ':floorRequest' => $floorRequest,
        ':nodeID' => $nodeID
    ]);

    // Output success or failure message
    if ($success) {
        if ($floorRequest == 1){
            echo "Request elevator going down by node $nodeID.";
        } else {
            echo "Request elevator going up by node $nodeID.";
        }
        
    } else {
        echo "Database update failed.";
    }
} else {    // Handle missing parameters
    echo "Missing nodeID or floorRequest.";
}
?>