<?php
require 'db_connection.php';  // Assumes db_connection.php has credentials and connection logic

$conn = getConnection();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $java =$_POST['java'];
    $c1 =$_POST['c1'];
    $c2 =$_POST['c2'];
    $o1 =$_POST['o1'];
    $o2 =$_POST['o2'];


    $j1_sql = "UPDATE menuTypeCost SET cost = $java WHERE menu_id = 1 AND type_id = 1;";
    $c1_sql = "UPDATE menuTypeCost SET cost = $c1 WHERE menu_id = 2 AND type_id = 2;";
    $c2_sql = "UPDATE menuTypeCost SET cost = $c2 WHERE menu_id = 2 AND type_id = 3;";
    $o1_sql = "UPDATE menuTypeCost SET cost = $o1 WHERE menu_id = 3 AND type_id = 2;";
    $o2_sql = "UPDATE menuTypeCost SET cost = $o2 WHERE menu_id = 3 AND type_id = 3;";  

    
 
    if (isset($java)){
        $conn->query($j1_sql);
    }
    if (isset($c1)){
        $conn->query($c1_sql);
    }
    if (isset($c2)){
        $conn->query($c2_sql);
    }
    if (isset($o1)){
        $conn->query($o1_sql);
    }
    if (isset($o2)){
        $conn->query($o2_sql);
    } 
}
?>