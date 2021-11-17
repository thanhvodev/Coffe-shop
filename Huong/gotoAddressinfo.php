<?php
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

        $sql = "SELECT * FROM `customer` WHERE `ID_ORDER`=(SELECT MAX(`ID_ORDER`) FROM `order`);";
        $cus = mysqli_query($conn, $sql);
        if (mysqli_num_rows($cart) == 0) {
            $sql = "SELECT MAX(`ID_ORDER`) AS `MAX` FROM `order`;";
            $max = mysqli_query($conn, $sql);
            $max = mysqli_fetch_assoc($max);
            $max = $max['MAX'];
    
            $sql = "INSERT INTO `customer` (`ID_ORDER`) VALUES ('$max');";
            $res = mysqli_query($conn, $sql);
        }
        mysqli_close($conn);
?>

