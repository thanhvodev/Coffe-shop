<?php
    $note = $_REQUEST["note"];
    $PID = $_REQUEST["ProID"];
    $total = $_REQUEST["total"];
    $qty = $_REQUEST["qty"];
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

$sql = "SELECT MAX(`ID_ORDER`) AS `OID` FROM `order`;";
$OID = mysqli_query($conn, $sql);
$OID = mysqli_fetch_assoc($OID);
$OID = $OID["OID"];

$sql = "SELECT * FROM `product_in_order` WHERE `PID` = '$PID' AND `ID_ORDER` = '$OID';";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    $sql = "UPDATE `product_in_order` SET `QUANTITY` = '$qty', `NOTE` = '$note', `TOTAL` = '$total' WHERE `PID` = '$PID' AND `ID_ORDER` = '$OID';";
        $res = mysqli_query($conn, $sql);
} 
else {
    $sql = "INSERT INTO `product_in_order`(`ID_ORDER`, `PID`, `QUANTITY`, `NOTE`, `TOTAL`) VALUES('$OID','$PID','$qty','$note','$total');";
    $res = mysqli_query($conn, $sql);
}

$sql = "SELECT SUM(`TOTAL`) AS `Final_price` FROM `product_in_order` WHERE `ID_ORDER` = '$OID';";
$Final_price = mysqli_query($conn, $sql);
$Final_price = mysqli_fetch_assoc($Final_price);
$Final_price = $Final_price['Final_price'];
$sql = "UPDATE `order` SET `TOTAL` = '$Final_price' WHERE `ID_ORDER` = '$OID';";
$res = mysqli_query($conn, $sql);

mysqli_close($conn);
?>