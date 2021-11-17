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
$orders = mysqli_query($conn, $sql);
$sql = "SELECT * FROM `customer` WHERE `ID_ORDER` = (SELECT MAX(`ID_ORDER`) FROM `order`);";
$customer = mysqli_query($conn, $sql);

mysqli_close($conn);

$order = mysqli_fetch_assoc($orders);
$customer = mysqli_fetch_assoc($customer);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo.svg" />
    <link rel="stylesheet" href="Checkout-General.css">
    <!-- <script src="Checkout.js"></script> -->
    
    <script src="upload.js"></script>
</head>

<body>
    <!-- logoshop -->
    <div id="header">
        <img id="logoimg" src="image/logo.svg" alt="logo shop">
        <p id="logotext"><b>Sokoshop</b></p>
        <div id="backhome"> </div>
        <button id="home" onclick="window.location.href='../Tan_Toan/coffee.html'">Quay lại cửa hàng</button>
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
            <div class="completerectangle"></div>
            <div class="completecircle">2</div>
            <div class="completerectangle"></div>
            <div class="completecircle">3</div>
        </div>
    </div>
    <!-- content -->
    <div id="content">
        <div id="typepayment">
            <label><b>Vui lòng chọn một trong hai hình thức thanh toán sau đây: </b></label><br><br>
            &emsp;&emsp;&emsp;<input type="radio" id="bycash" name="payment" value="bycash" onclick="checkbycash();">
            <label for="bycash">Thanh toán bằng tiền mặt khi nhận hàng</label><br><br>
            &emsp;&emsp;&emsp;<input type="radio" id="byATMcard" name="payment" value="byATMcard"
                onclick="checkbyATMcard();">
            <label for="byATMcard">Thanh toán bằng thẻ ngân hàng</label><br><br>
            <!-- appear if byATMcard is checked -->
            &emsp;Quý khách vui lòng gửi chuyển khoản đủ tổng tiền cần thanh toán vào Ngân hàng ABC. <br> 
         &emsp;Số tài khoản của cửa hàng: xxxxxxxxxxx <br><br>
         &emsp;Sau khi chuyển khoản thành công, quý khách vui lòng chụp lại màn hình giao dịch và tải lên đây:<br><br>
            <div id="extension">
                <p id="guide"></p>
                <div id="uploadimg">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>

                </div>
            </div>
        </div>
        <div id="information">
            <table id="info-table">
                <tr>
                    <th>Thông tin giao hàng</th>
                </tr>
                <tr>
                    <td>
                        <b>Họ tên khách hàng</b><br>
                        <p><?php echo $customer["FULLNAME"]; ?></p>
                        
                        <b>Số điện thoại: </b>
                        <p><?php echo $customer["PHONE_NO"]; ?></p>
                        <b>Địa chỉ: </b><br>
                        <?php echo $customer["NUMANDSTREET"],', ',$customer["DISTRICT"]; ?>
                    </td>
                </tr>
            </table>
            <br><br><br><br>
            <b>Tổng tiền cần thanh toán:</b>
            &emsp;<b style="color: red; font-size:25px;"><?php echo $order["TOTAL"]; ?></b>
        </div>
    </div>

    <!-- navigationbar -->
    <div id="navigationbar">
        <div id="leftbtn">
            <button class="footer-nav-btn" onclick="window.location.href='Checkout-Addressinfo.php'">Quay lại</button>
        </div>
        <div id="rightbtn">
            <button class="footer-nav-btn" onclick="succeeded()">Đặt mua</button>
        </div>
    </div>




</body>
<footer>
    <div class="logoFooter">
        <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
        <img id="logo" src="./image/logo.svg" alt="Logo"> Sokoshop
    </div>
</footer>

</html>