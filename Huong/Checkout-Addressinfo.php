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

$sql = "SELECT * FROM `customer` WHERE `ID_ORDER` = (SELECT MAX(`ID_ORDER`) FROM `order`);";
$cus = mysqli_query($conn, $sql);


if (mysqli_num_rows($cus) > 0) {
    $cus = mysqli_fetch_assoc($cus);
} else {
    $cus = NULL;
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="icon" href="../IMAGE/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="style/checkout.css">
    <title>Thanh toán | Thông tin giao hàng</title>
</head>

<body>

    <div class="row" style="padding-bottom:10px;background-color: #FFE4E1; min-height:60px;">
        <div class="col-sm-7" style="display: flex; padding-top: 10px; padding-left:50px;">
            <img src="../IMAGE/logo.svg">
            <b style="align-self:center;margin-left:10px; font-size:20px;">Sokoshop</b>
        </div>
        <div class="col-sm-5" style="text-align: right;padding-top: 15px; padding-right:100px;">
            <button onclick="window.location.href='../Tan_Toan/'">Trang chủ</button>
        </div>
    </div>
    <div style="margin-top: 20px; margin-bottom:20px;">
        <ul class="progressbar">
            <li class="active">Xác nhận đơn hàng</li>
            <li>Thông tin giao hàng</li>
            <li>Thanh toán, đặt mua</li>
        </ul>
    </div>
    <div style="margin-top: 100px; text-align:center;">
        <b style="font-size:25px">Thông tin giao hàng</b>
    </div>

    <div style="padding-left: 25%;margin-top: 10px;">
        <b style="font-size: 20px;">Thông tin khách hàng</b><br>
        <label style="font-size: 18px; margin-top:20px; margin-left: 50px;" for="fullname">Họ và tên: </label>
        &nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="text" id="fullname" <?php if ($cus != NULL) echo "value=" . "'" . $cus['FULLNAME'] . "'"; ?>> <br>
        <label style="font-size: 18px; margin-top:20px; margin-left: 50px;" for="phone">Số điện thoại: </label>
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="text" id="phone" <?php if ($cus != NULL) echo "value=" . "'" . $cus['PHONE_NO'] . "'"; ?>> <br><br>
        <b style="font-size: 20px;">Địa chỉ giao hàng</b><br>
        <label style="font-size: 18px; margin-top:20px; margin-left: 50px;" for="street">Số nhà, tên đường, phường: </label>
        &nbsp;&emsp;&emsp;&emsp; <input type="text" id="street" <?php if ($cus != NULL) echo "value=" . "'" . $cus['NUMANDSTREET'] . "'"; ?>> <br>
        <label style="font-size: 18px; margin-top:20px; margin-left: 50px;" for="district">Quận: </label>
        &nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="text" id="district" <?php if ($cus != NULL) echo "value=" . "'" . $cus['DISTRICT'] . "'"; ?>> <br><br>
    </div>


    <div class="foot-btn-container">
        <button class="foot-btn" onclick="window.location.href='Checkout-Vadidate.php'">Quay lại</button>
        <button class="foot-btn second-btn" onclick="postInfor()">Tiếp theo</button>
    </div>



    <div style="text-align:center; background-color: #FFE4E1; padding-bottom:10px; margin-top: 50px;">
        <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
        <img id="logo" src="../IMAGE/logo.svg" alt="Logo"> Sokoshop
    </div>

    <script>
        function postInfor() {
            let fullname = (document.getElementById("fullname").value).trim();
            let phone = (document.getElementById("phone").value).trim();
            let street = (document.getElementById("street").value).trim();
            let district = (document.getElementById("district").value).trim();
            if (fullname == "" || phone == "" || street == "" || district == "") {
                alert("Vui lòng nhập dầy đủ thông tin");
            } else {
                var data = new FormData();
                data.append("name", fullname);
                data.append("phone", phone);
                data.append("street", street);
                data.append("district", district);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "savecustomerinfo.php");
                xhr.onload = function() {
                    console.log(this.response);
                };
                xhr.send(data);
                window.location.href = 'Checkout-Payment.php';
            }
        }
    </script>

</body>

</html>