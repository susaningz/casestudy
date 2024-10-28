<?php
// Database connection details
require 'db_connection.php';

$sql = "SELECT coffeeType, SUM(quantity) AS totalSold FROM orders GROUP BY coffeeType";
$result = $conn->query($sql);

echo "<table><tr><th>Product</th><th>Total Sold</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . htmlspecialchars($row['coffeeType']) . "</td><td>" . htmlspecialchars($row['totalSold']) . "</td></tr>";
}
echo "</table>";

$conn->close();
?>
