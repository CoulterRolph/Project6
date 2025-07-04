<?php
try {
    // Connect to the database
    $db = new PDO('mysql:host=127.0.0.1;dbname=elevatortest;charset=utf8mb4', 'webadmin', 'somepassword', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Step 1: Get the first row (by nodeID and time)
    $stmt = $db->query("SELECT nodeID, time FROM elevatorNetwork ORDER BY nodeID, time ASC LIMIT 1");
    $row = $stmt->fetch();

    if ($row) {
        $nodeID = $row['nodeID'];
        $time   = $row['time'];

        // Step 2: Update status to 2
        $update = $db->prepare("UPDATE elevatorNetwork SET status = ? WHERE nodeID = ? AND time = ?");
        $update->execute([2, $nodeID, $time]);

        echo "<p><strong>First row's status updated to 2.</strong></p>";
    } else {
        echo "<p>No rows found to update.</p>";
    }

    // Step 3: Print entire table
    echo "<h3>Current Contents of elevatorNetwork:</h3>";
    $rows = $db->query("SELECT * FROM elevatorNetwork");

    if ($rows->rowCount() > 0) {
        echo "<table border='1' cellpadding='5'><tr>";

        // Fetch the first row to get column names
        $first = $rows->fetch(PDO::FETCH_ASSOC);
        foreach (array_keys($first) as $colName) {
            echo "<th>$colName</th>";
        }
        echo "</tr><tr>";
        foreach ($first as $val) {
            echo "<td>$val</td>";
        }
        echo "</tr>";

        // Print the rest of the rows
        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>$val</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Table is empty.</p>";
    }

} catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
?>
