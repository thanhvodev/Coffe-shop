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

$sql = "UPDATE `order` SET `COMPLETED` = 1 WHERE `ID_ORDER` = '$OID';";
$res = mysqli_query($conn, $sql);


mysqli_close($conn);
?>