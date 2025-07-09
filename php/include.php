<?php
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevatortest',
    'webadmin',
    'somepassword'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = 'UPDATE elevatorNetwork
          SET status = 2, currentFloor = 3
          WHERE nodeID = 3';

$db->exec($query);

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
