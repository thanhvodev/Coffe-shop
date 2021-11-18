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

$sql = "SELECT * FROM `order` ORDER BY `ID_ORDER` DESC LIMIT 1;";
$order = mysqli_query($conn, $sql);
$sql = "SELECT B.PRO_NAME AS `NAME` , B.PRICE AS `PRICE`, B.IMAGE_URL AS `IMG`,A.TOTAL AS `TOTAL`, A.QUANTITY AS `QTY` FROM (SELECT * FROM `product_in_order` WHERE `ID_ORDER` = (SELECT MAX(`ID_ORDER`) FROM `order`)) AS A, (SELECT * FROM `product` WHERE `PID` IN (SELECT `PID` FROM `product_in_order` WHERE `ID_ORDER` = (SELECT MAX(`ID_ORDER`) FROM `order`))) AS B WHERE A.PID = B.PID;";
$cart = mysqli_query($conn, $sql);

mysqli_close($conn);

$temp = mysqli_fetch_assoc($order);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán| Xác nhận đơn hàng</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo.svg" />
    <link rel="stylesheet" href="Checkout-General.css">
</head>

<body>
    <!-- logoshop -->
    <div id="header">
        <img id="logoimg" src="image/logo.svg" alt="logo shop">
        <p id="logotext"><b>Sokoshop</b></p>
        <div id="backhome"> </div>
        <button id="home" onclick="window.location.href='../Tan_Toan/'">Quay lại cửa hàng</button>
    </div>

    <!-- progressbar -->
    <div id="progressbar">
        <div id="progressname">
            <div>
                <p>Xác nhận đơn hàng</p>
            </div>
            <div id="text2">
                <p>Thông tin giao hàng</p>
            </div>
            <div>
                <p>Thanh toán, đặt mua</p>
            </div>
        </div>
        <div id="progress">
            <div class="completecircle">1</div>
            <div class="incompleterectangle"></div>
            <div class="incompletecircle">2</div>
            <div class="incompleterectangle"></div>
            <div class="incompletecircle">3</div>
        </div>
    </div>
    <!-- bill -->
    <br>
    <b style="padding-left: 40%; font-size:25px">CHI TIẾT ĐƠN HÀNG</b>
    <div id="billinfo">
        <table id="table-bill">
            <tr>
                <th class="bill-title">SẢN PHẨM</th>
                <th class="bill-title">GIÁ</th>
                <th class="bill-title">SỐ LƯỢNG</th>
                <th class="bill-title">TỔNG TIỀN</th>
              </tr>
              
        <?php
            if (mysqli_num_rows($cart) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($cart)) { ?>
                <tr>
                    <td style="display:flex; align-items: center">
                        <img src="<?php echo $row["IMG"] ?>" height="40px"> 
                        &nbsp;&nbsp;&nbsp;<p style="font-size: 16px;"><?php echo $row["NAME"] ?></p>
                    </td>
                    <td><?php echo $row["PRICE"] ?></td>
                    <td class="center-col"><?php echo $row["QTY"] ?></td>
                    <td class="center-col"><?php echo $row["TOTAL"] ?></td>
                </tr>
                <?php } ?>
            <?php } ?>
        </table>
        <b style="padding-left: 40%; font-size:25px">TỔNG CỘNG:</b> 
        &nbsp;&nbsp; <b style="color: red; font-size:25px;"><?php echo $temp["TOTAL"]?> VND</b>
    </div>

    <!-- navigationbar -->
    <div id="navigationbar">
        <div id="leftbtn">
            <button class="footer-nav-btn" onclick="window.location.href='../Tan_Toan/'">Quay lại</button>
        </div>
        <div id="rightbtn">
            <button class="footer-nav-btn" onclick= "my_function()">Tiếp theo</button>
        </div>
    </div>



<script>
function my_function() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
    }
  };
  request.open("GET", "gotoAddressinfo.php", true);
  request.send();
  window.location.href='Checkout-Addressinfo.php';
}

</script>

</body>
<footer>
    <div class="logoFooter">
        <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
        <img id="logo" src="./image/logo.svg" alt="Logo"> Sokoshop
    </div>
</footer>

</html>