

<?php
// Include individual reports
include 'salesbyproduct.php';
include 'salesbycategories.php';

// Determine best-selling product
require 'db_connection.php';

$sql = "SELECT coffeeType, SUM(quantity) as totalSold FROM orders GROUP BY coffeeType ORDER BY totalSold DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo "<br>The best-selling product is " . htmlspecialchars($row['coffeeType']) . " with " . htmlspecialchars($row['totalSold']) . " units sold.";

$conn->close();
?>
