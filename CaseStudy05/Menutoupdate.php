<?php
// Database connection details
require 'db_connection.php';

$sql = "SELECT * FROM coffee_prices";
$result = $conn->query($sql);

echo "<table><tr><th>Coffee Type</th><th>Price</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["name"]) . "</td><td>$" . htmlspecialchars($row["price"]) . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No results found.</td></tr>";
}
echo "</table>";

$conn->close();
?>
