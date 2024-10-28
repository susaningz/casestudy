<?php
// Database connection details
require 'db_connection.php';

$sql = "SELECT category, SUM(quantity) AS totalSold FROM orders GROUP BY category";
$result = $conn->query($sql);

echo "<table><tr><th>Category</th><th>Total Sold</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . htmlspecialchars($row['category']) . "</td><td>" . htmlspecialchars($row['totalSold']) . "</td></tr>";
}
echo "</table>";

$conn->close();
?>
