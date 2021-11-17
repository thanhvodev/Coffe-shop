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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
            <div class="completecircle" style="font-size: 15px;">1</div>
            <div class="completerectangle"></div>
            <div class="completecircle" style="font-size: 15px;">2</div>
            <div class="completerectangle"></div>
            <div class="completecircle" style="font-size: 15px;">3</div>
        </div>
    </div>
    <!-- content -->
    <div id="content">
        <div id="typepayment">
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
                    <input type="submit" value="Lưu ảnh" name="submit">
                </form>
                </br>
                <?php if($order["STATE"] == 1){ echo '<img src='. $order["LINKBILL"]. ' height="100px">'; }?>
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
                        <?php echo $customer["NUMANDSTREET"],', quận ',$customer["DISTRICT"]; ?>
                    </td>
                </tr>
            </table>
            <br><br><br><br>
            <b>Tổng tiền cần thanh toán:</b>
            <b style="color: red; font-size:20px;"><?php echo $order["TOTAL"]; ?> VND</b>
        </div>
    </div>

    <!-- navigationbar -->
    <div id="navigationbar">
        <div id="leftbtn">
            <button class="footer-nav-btn" onclick="window.location.href='Checkout-Addressinfo.php'">Quay lại</button>
        </div>
        <div id="rightbtn">
            <button class="footer-nav-btn" data-toggle="modal" data-target="#exampleModal">Đặt mua</button>
        </div>
    </div>



 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Đơn hàng của bạn đang được sử lý. Hãy để ý điện thoại! Nhân viên cửa hàng sẽ gọi điện cho bạn để xác nhận. 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="window.location.href='../Tan_Toan/coffee.html'">Tiếp tục vào cửa hàng</button>
      </div>
    </div>
  </div>
</div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
<footer>
    <div class="logoFooter">
        <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
        <img id="logo" src="./image/logo.svg" alt="Logo"> Sokoshop
    </div>
</footer>

</html>