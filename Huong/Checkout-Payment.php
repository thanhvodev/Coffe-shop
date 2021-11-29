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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel = "icon" href = "../IMAGE/logo.svg" type = "image/x-icon">
    <link rel="stylesheet" href="style/checkout.css">
    <title>Thanh toán | Thanh toán</title>

    <script>
        function finish(){
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open("GET", "finish.php?", true);
            xmlhttp.send();
            window.location.href='Checkout-Finish.php';
        }
    </script>

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
            <li>Thanh toán, đặt mua</li>
        </ul>
    </div>
    <div style="margin-top: 100px; text-align:center;">
        <b style="font-size:25px">Thanh toán, đặt mua</b>
    </div>

    <div class="row" style="padding-bottom:10px;padding-top:10px;">
        <div class="col-sm-7" style="padding-left:10%">
        <label><b>Vui lòng chọn một trong hai hình thức thanh toán sau đây: </b></label><br><br>
            &emsp;&emsp;&emsp;<input type="radio" id="bycash" name="payment" value="bycash"  
            <?php if($order["STATE"] == 0){echo ' checked="checked"';} ?>>
            <label for="bycash">Thanh toán bằng tiền mặt khi nhận hàng</label><br><br>
            &emsp;&emsp;&emsp;<input type="radio" id="byATMcard" name="payment" value="byATMcard" 
            <?php if($order["STATE"] == 1){echo ' checked="checked"';} ?>>
            <label for="byATMcard">Thanh toán bằng thẻ ngân hàng</label><br><br>
            <!-- appear if byATMcard is checked -->
            <div id="extension">
                <p id="guide">
                &emsp;Khi chọn hình thức chuyển khoản, quý khách vui lòng gửi chuyển khoản đủ tổng tiền cần thanh toán vào Ngân hàng ABC. <br> 
                &emsp;Số tài khoản của cửa hàng: xxxxxxxxxxx <br><br>
                &emsp;Sau khi chuyển khoản thành công, quý khách vui lòng chụp lại màn hình giao dịch và tải lên đây:<br><br>
                </p>
                <div id="uploadimg">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Gửi ảnh" name="submit">
                </form>
                </br>
                <?php if($order["STATE"] == 1){ echo '<img src='. $order["LINKBILL"]. ' height="100px">'; }?>
                </div>
            </div>
        </div>
        <div class="col-sm-5" style="padding-left:7%">
            <table class="info">
                <tr>
                    <th>Thông tin giao hàng</th>
                </tr>
                <tr>
                    <td>
                        <b>Họ tên khách hàng:</b><br>
                        <p><?php echo $customer["FULLNAME"]; ?></p>
                        
                        <b>Số điện thoại: </b>
                        <p><?php echo $customer["PHONE_NO"]; ?></p>
                        <b>Địa chỉ: </b><br>
                        <?php echo $customer["NUMANDSTREET"],', quận ',$customer["DISTRICT"]; ?>
                    </td>
                </tr>
            </table>
            <br>
            <b>Tổng tiền cần thanh toán:</b>
            <b style="color: red; font-size:20px;"><?php echo $order["TOTAL"]/ 1000 . ',' . '000' . ' VNĐ'; ?> </b>
        </div>
    </div>


    <div class="foot-btn-container" style="min-height:200px; padding-top:100px">
        <button class="foot-btn" onclick="window.location.href='Checkout-Addressinfo.php'">Quay lại</button>
        <button class="foot-btn second-btn" onclick="finish()">Hoàn tất</button>
    </div>



    <div style="text-align:center; background-color: #FFE4E1; padding-bottom:10px; margin-top: 50px;">   
        <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
        <img id="logo" src="../IMAGE/logo.svg" alt="Logo"> Sokoshop
    </div>


    <script type = "text/javascript">
    radio1 = document.getElementById('bycash');
	radio2 = document.getElementById('byATMcard');
	let content = document.getElementById('extension');
    if(radio1.checked){
        content.style.display = 'none';
    }
    radio1.addEventListener("click", function () {
		content.style.display = 'none';
	});

	radio2.addEventListener("click", function () {
		content.style.display = 'block';
	});
    </script>
</body>

</html>