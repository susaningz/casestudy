<?php
// Database connection details
require 'db_connection.php';  // Assumes db_connection.php has credentials and connection logic
    
    $conn = getConnection();


    $stmt = "SELECT cost FROM menutypecost;";
    $result = $conn->query($stmt);

    $report = [];
    while ($row = $result->fetch_assoc()){
        array_push($report,$row['cost']);
    }

    /* $itemId = $_POST['itemId'];
    
    // Sanitize input
    #$newPrice = filter_var($newPrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    #$itemId = filter_var($itemId, FILTER_SANITIZE_NUMBER_INT);

    $stmt = $conn->prepare("UPDATE coffee_prices SET price=? WHERE id=?");
    $stmt->bind_param("di", $newPrice, $itemId);

    if ($stmt->execute()) {
        echo "Price updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
    $conn->close(); 
 */

?>
<!doctype html>
<html lang="en">
<head>
    <title>JavaJam Coffee House - Update Menu</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="colour.css">
    <style>
        /* Additional inline styles for alignment */
        .update-row {
            display: flex;
            align-items: center;
        }
        .price-input {
            margin-left: 10px;
            width: 50px;
        }
        .update-description {
            flex-grow: 1;
            padding: 10px;
            background-color: #ddb77e;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <header>
            <img src="header.jpg" alt="JavaJam Coffee House" width="100%">
        </header>
        <div id="leftcolumn">
            <nav>
                <ul>
                    <li><a href="index3.html"><b>Home</b></a></li> &nbsp;
                    <li><a href="menu.html"><b>Menu</b></a></li> &nbsp;
                    <li><a href="music.html"><b>Music</b></a></li> &nbsp;
                    <li><a href="jobs.html"><b>Jobs</b></a></li> &nbsp;
                </ul>
            </nav>
        </div>

        <div id="rightcolumn">
            <h2>Click to update product prices:</h2>
            <div class="content">
                <form action="updatePrice2.php" method="post" id="priceUpdateForm">
                    <div class="update-row">
                        <div class="update-description">
                            <b>Just Java</b><br>
                            Regular house blend, decaffeinated coffee, or flavor of the day.<br>
                            Endless cup $<?=$report[0]?>
                        </div>
                        <input type="text" class="price-input" name="java" placeholder="New Price">
                    </div>

                    <div class="update-row">
                        <div class="update-description">
                            <b>Cafe au Lait</b><br>
                            House blended coffee infused into a smooth, steamed milk.<br>
                            Single $<?=$report[1]?> Double $<?=$report[2]?>
                        </div>
                        <input type="text" class="price-input" name="c1" placeholder="New Single Price">
                        <input type="text" class="price-input" name="c2" placeholder="New Double Price">
                    </div>

                    <div class="update-row">
                        <div class="update-description">
                            <b>Iced Cappuccino</b><br>
                            Sweetened espresso blended with icy-cold milk and served in a chilled glass.<br>
                            Single $<?=$report[3]?> Double $<?=$report[4]?>
                        </div>
                        <input type="text" class="price-input" name="o1" placeholder="New Single Price">
                        <input type="text" class="price-input" name="o2" placeholder="New Double Price">
                    </div>
                    <br>
                    <input type="submit" value="Update Prices">
                </form>
            </div>
        </div>
        <footer>
            <small><i>Copyright &copy; 2014 JavaJam Coffee House
                <br><a href="mailto:shuning@wu.com">shuning@wu.com</a>
            </i></small>
        </footer>
    </div>
</body>
<script src="Updatemenu.js"></script>
</html>



