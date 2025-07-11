<?php
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

    $query = 'UPDATE floorControl
              SET floorRequest = :floorRequest
              WHERE nodeID = :nodeID';

    $stmt = $db->prepare($query);
    $success = $stmt->execute([
        ':floorRequest' => $floorRequest,
        ':nodeID' => $nodeID
    ]);

    if ($success) {
        if ($floorRequest == 1){
            echo "Request elevator going down by node $nodeID.";
        } else {
            echo "Request elevator going up by node $nodeID.";
        }
        
    } else {
        echo "Database update failed.";
    }
} else {
    echo "Missing nodeID or floorRequest.";
}
?>