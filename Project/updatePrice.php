<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        ['id' => 1, 'name' => 'Example Product 1', 'price' => 10.00, 'quantity' => 1],
        ['id' => 2, 'name' => 'Example Product 2', 'price' => 15.00, 'quantity' => 2]
    ];
}

// Function to update the quantity
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $id => $quantity) {
        // Update quantity in the session cart
        foreach ($_SESSION['cart'] as &$product) {
            if ($product['id'] == $id) {
                $product['quantity'] = (int) $quantity; // Update quantity
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-logo">LOGO</div>
        <ul class="navbar-links">
            <li><a href="#">Menu</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Cart</a></li>
        </ul>
    </nav>

    <!-- Order Table Section -->
    <section class="order-table">
        <form method="POST" action="cart.php">
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo '$' . number_format($product['price'], 2); ?></td>
                        <td>
                            <input type="number" name="quantity[<?php echo $product['id']; ?>]" value="<?php echo $product['quantity']; ?>" min="1">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="update_cart" class="update-cart">Update Cart</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <p>Copyright</p>
        <a href="#">Contact Us</a>
    </footer>

</body>
</html>
