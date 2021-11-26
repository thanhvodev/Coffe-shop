<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sokoshop - Cửa hàng</title>
    <link rel="shortcut icon" type="image/x-icon" href="../IMAGE/logo.svg" />
    <link type="text/css" rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link type="text/css" rel="stylesheet" href="style.css">


</head>

<body>

    <!-- Begin Nav -->
    <div class="navbar navbar-expand-md navHome">
        <div class="logo navbar-brand">
            <img id="logo" src="../IMAGE/logo.svg" alt="Logo"> Sokoshop
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar"
            aria-expanded="false">
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
                <button id = "cart" type="button" class="btn btn-light cartButton">Giỏ hàng
                    <i class="fa fa-cart-plus cart-icon"></i>
                </button> 
                <div id="myCart" class="modal">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-header"> 
                                <div class="center"><h3>Chi tiết đơn hàng</h3></div> 
                                    <button type="button" class="btn-close close"></button> 
                                </div> 
                                <div class="modal-body">
                                    <div class="cart-row">
                                        <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                                        <span class="cart-price cart-header cart-column">Giá</span>
                                        <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                                        <span class="cart-totalprice cart-header cart-column">Tổng tiền</span>
                                        <span class="cart-delete cart-header cart-column"></span>
                                    </div>
                                    <div class="cart-items">
                                        
                                    </div>
                                    <div class="cart-total">
                                        <strong class="cart-total-title">Tổng Cộng:</strong>
                                        <span class="cart-total-price">0VND</span>
                                    </div>
                                </div>
                                <div class="modal-footer" id="navigationbar">
                                    <div id="rightbtn" class="cartButton">
                                        <button class="btn btn-danger order" onclick="window.location.href='../Huong/Vadidate.html'">Thanh toán</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
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
                        <li><a href="index.php">Sản phẩm hàng đầu</a></li>
                        <li><a class="active">Cà phê</a></li>
                        <li><a href="tea.php">Trà trái cây - trà sữa</a></li>
                        <li><a href="ice_blended.php">Đá xay - Choco - Matcha</a></li>
                        <li><a href="enjoy_at_home.php">Thưởng thức tại nhà</a></li>
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
                        <h3>CÀ PHÊ</h3>
                    </div>
                    <div class="col-md-6 col-12 search">
                        <form action="search.php" class="d-flex searchTool" method="GET">
                            <input class="form-control me-2" type="text" name="search" placeholder="Bạn muốn tìm gì?">
                            <button class="btn btn-danger" type="submit"><i class="material-icons">search</i></button>
                        </form>
                    </div>
                    <div class="col-md-6 col-12 mainHeader-hidden" style="display: none">
                        <h3>CÀ PHÊ</h3>
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


$sql = "select * from PRODUCT where CAT_NAME = 'Cà Phê'";
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
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=' . '#'.'detail'. $row["PID"] . '>Chi tiết</button>
                                </div>
                            </div>
                        </div>';


    // The Modal Detail
    echo '<div class="modal fade" id='.'detail'. $row["PID"] . '>
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
                                                        <label for "'.'input-qty-'. $row["PID"] . '" class="label-qty"><i class="material-icons">format_list_numbered</i> Số lượng</label>
                                                        <input id='.'input-qty-'. $row["PID"] . ' class="input-qty" type="number" value="1">
                                                    </div>
                                                    <div class="note">
                                                        <label for "'.'input-note-'. $row["PID"] . '" class="label-note"><i class="fa fa-pencil-square-o"></i> Ghi chú thêm cho món này</label><br>
                                                        <input id='.'input-note-'. $row["PID"] . ' class="input-note" type="text">
                                                    </div>
                                                </form>

                                                <button id="cart" type="button"  class="addToCart btn btn-cart">Thêm vào Giỏ hàng</button>
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

    <script src ="cart.js"></script>

</body>

</html>