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
    $sql = "SELECT MAX(`ID_ORDER`) AS `MAX` FROM `order`;";
    $max = mysqli_query($conn, $sql);
    $max = mysqli_fetch_assoc($max);
    $max = $max['MAX'];

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
            <li class="active">Xác nhận đơn hàng</li>
            <li class="active">Thông tin giao hàng</li>
            <li class="active">Thanh toán, đặt mua</li>
        </ul>
    </div>
    <div style="margin-top: 100px; text-align:center;">
        <b style="font-size:25px">Hoàn tất đặt hàng!</b>
    </div>
    <div style="text-align:center; margin-left:15%; width: 70%;">
        <p>Bạn vừa hoàn tất đặt hàng. </p>
        <p>Mã đơn hàng của bạn là: <?php echo '<b>' . $max . '</b>'; ?>.</p> 
        <p>Trong vài phút nữa sẽ có nhân viên liên lạc để xác nhận lại đơn hàng của bạn. 
            Vui lòng kiểm tra tin nhắn. 
            Nếu sau 10 phút vẫn chưa nhận được liên lạc từ cửa hàng, vui lòng gọi vào số: 0987654321</p>
        <b>Cám ơn quý khách đã ghé qua cửa hàng Sokoshop!</b><br>
        <button style="margin-top:10px;" onclick="window.location.href='../Tan_Toan/'">Về trang chủ</button>
    </div>


    <div style="text-align:center; background-color: #FFE4E1; padding-bottom:10px; margin-top: 50px;position: absolute;bottom: 0; width: 100%;">   
        <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
        <img id="logo" src="../IMAGE/logo.svg" alt="Logo"> Sokoshop
    </div>


</body>

</html>