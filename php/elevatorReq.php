<?php
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatorCSD',
    'user',
    'password'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$nodeID = $_POST['nodeID'];
$floorRequest = $_POST['floorRequest'];

$query = 'UPDATE floorControl
          SET floorRequest = :floorRequest
          WHERE nodeID = :nodeID';

$stmt = $db->prepare($query);
$stmt->execute([
    ':floorRequest' => $floorRequest,
    ':nodeID' => $nodeID
]);

if (!empty($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    // Fallback if no referer is set
    header("Location: index.php");
    exit;
}
/*
$query2 = 'SELECT * FROM elevatorNetwork';
$rows = $db->query($query2);
foreach ($rows as $row)
{
    var_dump($row);
    echo "<br /><br />";
}
*/
?>
