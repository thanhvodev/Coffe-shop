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

$order = mysqli_fetch_assoc($order);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel = "icon" href = "../IMAGE/logo.svg" type = "image/x-icon">
    <link rel="stylesheet" href="style/checkout.css">
    <title>Thanh toán | Xác nhận đơn hàng</title>
</head>
<body>

    <div class="row" style="padding-bottom:10px;background-color: #FFE4E1; min-height:60px;">
        <div class="col-sm-7" style="display: flex; padding-top: 10px; padding-left:50px;">
            <img src="../IMAGE/logo.svg">
            <b style="align-self:center;margin-left:10px; font-size:20px;">Sokoshop</b>
        </div>
        <div  class="col-sm-5" style="text-align: right;padding-top: 15px; padding-right:100px;">
            <button onclick="window.location.href='../Tan_Toan/'">Trang chủ</button>
        </div>
        </div>
    <div style="margin-top: 20px; margin-bottom:20px;">
        <ul class="progressbar" >
            <li>Xác nhận đơn hàng</li>
            <li>Thông tin giao hàng</li>
            <li>Thanh toán, đặt mua</li>
        </ul>
    </div>
    <div style="margin-top: 100px; text-align:center;">
        <b style="font-size:25px">Chi tiết đơn hàng</b>
    </div>

    <div style="margin-top: 30px;padding-left: 12%; min-height: 300px">
        <table class="bill">
            <tr>
                <th class="bill-title" style="width:40%">Sản phẩm</th>
                <th class="bill-title" style="width:20%">Giá</th>
                <th class="bill-title" style="width:20%">Số lượng</th>
                <th class="bill-title" style="width:20%">Tổng tiền</th>
            </tr>
            <?php
            if (mysqli_num_rows($cart) > 0) { 
                while ($row = mysqli_fetch_assoc($cart)) { ?>
            <tr>
                <td> &nbsp; <img src="<?php echo $row["IMG"] ?>" height="40px"> &nbsp;  &nbsp;<?php echo $row["NAME"] ?></td>
                <td style="text-align: center;"><?php echo $row["PRICE"]/ 1000 . '.' . '000' . ' đ'; ?></td>
                <td style="text-align: center;"><?php echo $row["QTY"] ?></td>
                <td style="text-align: center;"><?php echo $row["TOTAL"]/ 1000 . '.' . '000' . ' đ'; ?></td>
            </tr>
            <?php }} ?>
        </table>
        <br>
        <b style="padding-left:33%; font-size:18px;">TỔNG CỘNG : </b>
        <b style="font-size: 18px; color:red;"> <?php echo $order["TOTAL"]/ 1000 . '.' . '000' . ' đ'; ?></b>
    </div>


    <div class="foot-btn-container" style="min-height:200px; padding-top:100px">
        <button class="foot-btn" onclick="window.location.href='../Tan_Toan/'">Quay lại</button>
        <button class="foot-btn second-btn" onclick= "my_function()">Tiếp theo</button>
    </div>

    <div style="text-align:center; background-color: #FFE4E1; padding-bottom:10px; margin-top: 50px;">   
        <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
        <img id="logo" src="../IMAGE/logo.svg" alt="Logo"> Sokoshop
    </div>

<script>
function my_function() {
  var request = new XMLHttpRequest();
  request.open("GET", "gotoAddressinfo.php", true);
  request.send();
  window.location.href='Checkout-Addressinfo.php';
}
</script>

</body>

</html>