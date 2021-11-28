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

$sql = "SELECT * FROM `order` WHERE `ID_ORDER` = (SELECT MAX(`ID_ORDER`) FROM `order`) AND `COMPLETED` = 0;";
$order = mysqli_query($conn, $sql);


if (mysqli_num_rows($order) > 0) {
    $order = mysqli_fetch_assoc($order);
} else {
    $sql = "INSERT INTO `order`(`STATE`,`COMPLETED`) VALUES (0,0);";
    $order = mysqli_query($conn, $sql);
    $sql = "SELECT * FROM `order` WHERE `ID_ORDER` = (SELECT MAX(`ID_ORDER`) FROM `order`) AND `COMPLETED` = 0;";
    $order = mysqli_query($conn, $sql);
    $order = mysqli_fetch_assoc($order);
}

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sokoshop - Cửa hàng</title>
    <link rel="shortcut icon" type="image/x-icon" href="../IMAGE/logo.svg" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="style.css">




</head>

<body>

    <!-- Begin Nav -->
    <div class="navbar navbar-expand-md navHome">
        <div class="logo navbar-brand">
            <img id="logo" src="../IMAGE/logo.svg" alt="Logo"> Sokoshop
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-expanded="false">
            <i class='fas fa-list'></i>
        </button>
        <div class="collapse navbar-collapse listNav" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Cửa hàng</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Theo dõi</a></li>
                <li class="nav-item"><a class="nav-link" href="../Thanh/login.php">Quản lý</a></li>
            </ul>
            <form class="d-flex cart">
                <button id="cart" class="btn btn-light cartButton"><a href="cart.php" class="navbar-brand">Giỏ hàng
                        <i class="fa fa-cart-plus cart-icon"></i></a>
                </button>
            </form>
        </div>
    </div>

    <!-- End Nav -->
    <div class="container-fluid">
        <div class="row">
            <img id="largeImage" src="../IMAGE/caphe.jpg" alt="Large image" style="width:100%">
        </div>

        <div class="row content">
            <div class="col-xl-3 col-lg-4 col-12 first">
                <div class="category">
                    <h4><i class="material-icons">format_list_bulleted</i> Danh mục sản phẩm</h4>
                    <ul>
                        <li><a class="active">Sản phẩm hàng đầu</a></li>
                        <li><a href="coffee.php">Cà Phê</a></li>
                        <li><a href="tea.php">Trà Trái Cây - Trà Sữa</a></li>
                        <li><a href="ice_blended.php">Đá xay - Choco - Matcha</a></li>
                        <li><a href="enjoy_at_home.php">Thưởng Thức Tại Nhà</a></li>
                    </ul>
                </div>
                <div class="news">
                    <h4><i class="fa fa-newspaper-o"></i> Tin tức</h4>

                    <div class="card">
                        <div class="card-body">
                            <img class="imageCard" src="../IMAGE/news1.jpg" alt="Card image" style="width:100%">
                            <p class="card-text">
                                <span style="font-weight:bold;">VUI CÓ BẠN - TƯƠI TRẺ CÓ ĐÔI</span><br>
                                Ngày 15/11/2021, Sokoshop ra mắt phiên bản App mới với mong muốn tối ưu trải nghiệm
                            </p>
                            <button type="button" class="btn btn-danger">Đọc tiếp</button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <img class="imageCard" src="../IMAGE/news2.jpg" alt="Card image" style="width:100%">
                            <p class="card-text">
                                <span style="font-weight:bold;">GU ĐẬM ĐÀ - DEAL ĐẬM CHẤT CHO NGÀY MỚI NĂNG
                                    LƯỢNG</span><br>
                                Ngày 15/11/2021, Sokoshop ra mắt phiên bản App mới với mong muốn tối ưu trải nghiệm
                            </p>
                            <button type="button" class="btn btn-danger">Đọc tiếp</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-12 second">
                <div class="row">
                    <div class="col-md-6 col-12 mainHeader">
                        <h3>SẢN PHẨM HÀNG ĐẦU</h3>
                    </div>
                    <div class="col-md-6 col-12 search">
                        <form action="search.php" class="d-flex searchTool" method="GET">
                            <input class="form-control me-2" type="text" name="search" placeholder="Bạn muốn tìm gì?">
                            <button class="btn btn-danger" type="submit"><i class="material-icons">search</i></button>
                        </form>
                    </div>
                    <div class="col-md-6 col-12 mainHeader-hidden" style="display: none">
                        <h3>SẢN PHẨM HÀNG ĐẦU</h3>
                    </div>
                </div>

                <div class="row">
                    <?php

                    // Kết nối sql
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "sokoshop";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    $sql = "select * from PRODUCT where TOP_PRO = 1";
                    $result = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-xl-4 col-lg-6 col-md-4 col-lg-offset-1 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <img class="imageCard" src=' . $row["IMAGE_URL"] . ' alt="Card image" style="width:100%">
                                    <div class="card-text">
                                        <p class="pro_name">' . $row["PRO_NAME"] . '</p>
                                        <p class="pro_price">' . $row["PRICE"] / 1000 . '.' . '000' . 'đ</p>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=' . '#' . 'detail' . $row["PID"] . '>Chi tiết</button>
                                </div>
                            </div>
                        </div>';


                        // The Modal Detail
                        echo '<div class="modal fade" id=' . 'detail' . $row["PID"] . '>
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
        
                                    <div class="modal-body">
                                        <div class="row">
        
                                            <div class="col-lg-5 col-12 modalCol1">
                                                <img class="modalImage" src=' . $row["IMAGE_URL"] . ' alt="Ảnh ' . $row["PRO_NAME"] . '" style="width:100%">
                                            </div>
        
                                            <div class="col-lg-7 col-12 modalCol2">
                                                <div class="name-price">
                                                    <h4>' . $row["PRO_NAME"] . '</h4>
                                                    <p class="" style="font-size:1.2em">' . $row["PRICE"] / 1000 . '.' . '000' . 'đ</p>
                                                </div>
                                                <form>
                                                    <div class="quantity d-flex">
                                                        <label for "' . 'input-qty-' . $row["PID"] . '" class="label-qty"><i class="material-icons">format_list_numbered</i> Số lượng</label>
                                                        <input id="' . 'input-qty-' . $row["PID"] . '" class="input-qty" type="number" value="1" min="1">
                                                    </div>
                                                    <div class="note">
                                                        <label for "' . 'input-note-' . $row["PID"] . '" class="label-note"><i class="fa fa-pencil-square-o"></i> Ghi chú thêm cho món này</label><br>
                                                        <input id="' . 'input-note-' . $row["PID"] . '" class="input-note" type="text">
                                                    </div>
                                                </form>

                                                <button id="cart" type="button"  data-bs-dismiss="modal" class="addToCart btn btn-cart" onclick="javascript:addOrUpdateOrder(\'' . $row["PID"] . '\',\'input-note-' . $row["PID"] . '\',\'input-qty-' . $row["PID"] . '\', ' . $row["PRICE"] . ')">Thêm vào Giỏ hàng</button>
                                            </div>
        
                                        </div>
        
        
                                        <h4 class="description-heading"><i class="far fa-eye"></i> Thông tin sản phẩm</h4>
                                        <div class="description-content"><br>
                                            <h5>' . $row["TITLE"] . '</h5>
                                            <p>' . $row["DESCR"] . '</p>
                        
                                        </div>
                                    </div>
        

        
                                </div>
                            </div>
                        </div>';
                    }


                    ?>
                </div>

            </div>

        </div>
    </div>

    <footer>
        <div class="logoFooter">
            <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
            <img id="logo" src="../IMAGE/logo.svg" alt="Logo"> Sokoshop
        </div>
    </footer>

    <script type="text/javascript">
        function addOrUpdateOrder(PID, note, quantity, price) {
            alert("Bạn đã thêm vào giỏ hàng!");
            var qty = parseInt(document.getElementById(quantity).value);
            var total = qty * price;
            var notetext = document.getElementById(note).value.toString().trim();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "addOrUpdateOrder.php?ProID=" + PID + "&note=" + notetext + "&total=" + total + "&qty=" + qty, true);
            xmlhttp.send();
        }
    </script>

</body>

</html>