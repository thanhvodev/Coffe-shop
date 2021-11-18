<?php
if (isset($_GET['submit'])) {
    $randomNumber = 'p' . rand(0, 9999);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sokoshop";

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

    $sql = "INSERT INTO product (PID, PRO_NAME, PRICE, QUANTITY, FUND, IMAGE_URL, TITLE, DESCR, CAT_NAME, TOP_PRO) VALUES ('$randomNumber', '$name', $price, $quantity, $fund, '$imagelink','','$description','$category',$top)";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

header('location: top-product.php');
