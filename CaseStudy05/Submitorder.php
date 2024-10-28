

<?php
// Database connection details
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coffeeType = $_POST['coffeeType'];
    $quantity = $_POST['quantity'];

    // Sanitize input
    $coffeeType = filter_var($coffeeType, FILTER_SANITIZE_STRING);
    $quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);

    $stmt = $conn->prepare("INSERT INTO orders (coffeeType, quantity) VALUES (?, ?)");
    $stmt->bind_param("si", $coffeeType, $quantity);

    if ($stmt->execute()) {
        echo "Order submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<form method="post" action="">
    Coffee Type: <input type="text" name="coffeeType" required>
    Quantity: <input type="number" name="quantity" required>
    <input type="submit" value="Submit Order">
</form>
