<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sokoshop";

    $fullname = $_POST['name'];
    $phonenumber = $_POST['phone'];
    $numberandstreet = $_POST['street'];
    $district = $_POST['district'];


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE `customer` SET `FULLNAME` = '$fullname', `PHONE_NO` = '$phonenumber', `NUMANDSTREET` = '$numberandstreet', `DISTRICT` = '$district' WHERE `ID_ORDER` =(SELECT MAX(`ID_ORDER`) FROM `order`);";

    mysqli_query($conn, $sql);

    mysqli_close($conn);
   
?>