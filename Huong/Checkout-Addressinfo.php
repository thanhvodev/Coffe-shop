<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán| Nhập thông tin giao hàng</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo.svg" />
    <link rel="stylesheet" href="Checkout-General.css">
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
            <div class="incompleterectangle"></div>
            <div class="incompletecircle">3</div>
        </div>
    </div>
    <!-- addressinfo -->
    <div id="addressinfo">
        <form action="savecustomerinfo.php" method="get">
            <label><b>Thông tin khách hàng: </b></label><br><br><br>
            &emsp;&emsp;&emsp;<label for="fullname">Họ và tên: </label>&emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="text" id="fullname" name="fullname"><br><br><br>
            &emsp;&emsp;&emsp;<label for="phonenumber">Số điện thoại:</label>&emsp;&emsp;&emsp;&emsp;
            <input type="text" id="phonenumber" name="phonenumber"><br><br><br>
            <label><b>Địa chỉ nhận hàng: </b></label><br><br><br>
            &emsp;&emsp;&emsp;<label for="numberandstreet">Số nhà, tên đường: </label>&emsp;
            <input type="text" id="numberandstreet" name="numberandstreet"><br><br><br>
            &emsp;&emsp;&emsp;<label for="district">Quận:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="text" id="district" name="district"><br><br><br>
            <b>Quý khách vui vòng nhấn vào nút lưu thông tin trước khi sang bước tiếp theo!</b>
            <br><br>
            <input type="submit" value="Lưu thông tin">
        </form>
    </div>

    <!-- navigationbar -->
    <div id="navigationbar">
        <div id="leftbtn">
            <button class="footer-nav-btn" onclick="window.location.href='Checkout-Vadidate.php'">Quay lại</button>
        </div>
        <div id="rightbtn">
            <button class="footer-nav-btn" onclick="window.location.href='Checkout-Payment.php'">Tiếp theo</button>
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