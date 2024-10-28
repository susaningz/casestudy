<?php

function getConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $name = "java_jam";
    $conn = new mysqli($servername, $username, $password, $name);
    if ($conn->connect_error){
        return;
    }
    else{
        return $conn;
    }
}

?>
