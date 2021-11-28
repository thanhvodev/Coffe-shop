<?php
    $PID = $_REQUEST["ProIDToDel"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sokoshop";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT MAX(`ID_ORDER`) AS `ID` FROM `order` WHERE `COMPLETED` = 0;";
    $OID = mysqli_query($conn, $sql);
    $OID = mysqli_fetch_assoc($OID);
    $OID = $OID['ID'];
    $sql = "DELETE FROM `product_in_order` WHERE `PID` = '$PID' AND `ID_ORDER` = '$OID';";
    $res = mysqli_query($conn, $sql);

    $sql = "SELECT SUM(`TOTAL`) AS `Final_price` FROM `product_in_order` WHERE `ID_ORDER` = '$OID';";
    $Final_price = mysqli_query($conn, $sql);
    $Final_price = mysqli_fetch_assoc($Final_price);
    $Final_price = $Final_price['Final_price'];
    $sql = "UPDATE `order` SET `TOTAL` = '$Final_price' WHERE `ID_ORDER` = '$OID';";
    $res = mysqli_query($conn, $sql);

    mysqli_close($conn);
?>