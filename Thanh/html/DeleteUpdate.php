<?php
if (isset($_GET['delete'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sokoshop";

    $name  = $_GET['name'];
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sql to delete a record
    $sql = "DELETE FROM product WHERE PRO_NAME='$name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else if (isset($_GET['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sokoshop";


    $pdid = $_GET['pdid'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $quantity = $_GET['quantity'];
    $fund = $_GET['fund'];
    $imagelink = $_GET['image-link'];
    $description = $_GET['description'];
    $category = $_GET['category'];
    if (isset($_GET['isTop'])) {
        $top = 1;
    } else {
        $top = 0;
    }
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE product SET PRO_NAME='$name', PRICE=$price, QUANTITY=$quantity, FUND=$fund, IMAGE_URL='$imagelink', TITLE='', DESCR='$description', CAT_NAME='$category', TOP_PRO='$top' WHERE PID='$pdid'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
