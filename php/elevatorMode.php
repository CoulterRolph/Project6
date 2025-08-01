<?php
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'user',
    'password'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if (isset($_POST['elevatorMode'])) {
    $mode = $_POST['elevatorMode'];

    $query = 'UPDATE diagnosticsControl
              SET elevatorMode = :mode
              WHERE nodeID = 0';

    $stmt = $db->prepare($query);
    $success = $stmt->execute([':mode' => $mode]);

    if ($success) {
        echo "Elevator mode set to $mode.";
    } else {
        echo "Failed to update elevator mode.";
    }
} else {
    echo "Missing elevatorMode.";
}
?>
