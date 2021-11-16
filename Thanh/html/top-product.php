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

$sql = "SELECT PID, PRO_NAME, PRICE, QUANTITY, FUND, IMAGE_URL, TITLE, DESCR, CAT_NAME, TOP_PRO FROM product";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản phẩm hàng đầu</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.svg" />
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <link type="text/css" rel="stylesheet" href="../css/style.css">
</head>

<body>

  <div id="modal-products">
  </div>
  <!-- All -->
  <div class="container-fluid">
    <!-- Nav Bar -->
    <div class="row nav navHome">
      <div class="col-md-3 col-sm-3 col-12 logo">
        <img id="logo" src="../images/logo.svg" alt="Logo"> Sokoshop
      </div>

      <div class="col-md-6 col-sm-6 col-12 listNav">
        <ul>
          <li><a href="#contact" class="active">Menu</a></li>
          <li><a href="../../PMH/html/boss_view.php">Doanh thu</a></li>
        </ul>
      </div>

      <div class="col-3 cart">
        <a href="../../Tan_Toan/coffee.html"><button type="button" class="btn btn-light cartButton">Đăng xuất <i class="fa fa-sign-out"></i></button></a>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row content">
        <div class="col-3 first">
          <div class="category">
            <h4>Danh mục sản phẩm</h4>
            <ul>
              <li><a class="active" href="#">Sản phẩm hàng đầu</a></li>
              <li><a href="./Coffe.php">Cà phê</a></li>
              <li><a href="./Juice-Tea.php">Trà trái cây - trà sữa</a></li>
              <li><a href="./Choco-Matcha.php">Đá xay - Choco - Matcha</a></li>
              <li><a href="./AtHome.php">Thưởng thức tại nhà</a></li>
            </ul>
          </div>
          <button type="button" class="btn btn-primary news" style="width: 88%;" data-bs-toggle="modal" data-bs-target="#addproductModal">
            Thêm sản phẩm
          </button>
          <!-- Modal -->
          <form action="AddProduct.php" method="get">
            <div class="modal fade" id="addproductModal" tabindex="-1" aria-labelledby="addproductModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addproductModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-6">
                          <!-- <img id="thumbnail-adding" src="../images/add-image.png" class="bg-info img-fluid"> -->

                          <input name="image-link" type="text" class="btn news linkimg" placeholder="link to image">
                          <select name="category" class="form-select" aria-label="Default select example">
                            <option value="Cà phê">Cà phê</option>
                            <option value="Trà trái cây - trà sữa">Trà trái cây - trà sữa</option>
                            <option value="Đá xoay - choco - Matcha">Đá xoay - choco - Matcha</option>
                            <option value="Thưởng thức tại nhà">Thưởng thức tại nhà</option>
                          </select>
                          <label for="quantity" class="form-label">Quantity</label>
                          <input type="text" class="form-control" id="quantity" name="quantity">
                          <label for="fund" class="form-label">Fund</label>
                          <input type="text" class="form-control" id="fund" name="fund">
                        </div>

                        <div class="col-6">
                          <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name">
                          </div>
                          <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea name="description" id="description" cols="22" rows="5"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" class="form-control" id="price" name="price">
                          </div>
                          <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="top-product" name="isTop" value="1">
                            <label class="form-check-label" for="top-product">Sản phẩm hàng đầu</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <input id="add-product" type="submit" name="submit" value="Lưu" class="btn btn-primary" data-bs-dismiss="modal" />
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-9 second">
          <div class="row">
            <div class="col-6 mainHeader">
              <h3>Sản phẩm hàng đầu</h3>
            </div>
            <div class="col-6 search">
              <form class="d-flex searchTool">
                <input class="form-control me-2" type="text" placeholder="Bạn muốn tìm gì?">
                <button class="btn btn-danger" type="button">Tìm kiếm</button>
              </form>
            </div>
          </div>
          <div id="product-holder" class="row">
            <?php
            if (mysqli_num_rows($result) > 0) { ?>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <?php if ($row["TOP_PRO"] == 1) { ?>
                  <div class="col-md-4 col-sm-6 col-lg-offset-1 col-6">
                    <div class="card">
                      <div class="card-body">
                        <img class="imageCard" src=<?php echo $row["IMAGE_URL"] ?> alt="Card image" style="width:100%">
                        <p class="card-text"><?php echo $row["PRO_NAME"] ?><br>
                          <?php echo $row["PRICE"] ?> đ
                        </p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?php echo $row["PID"] ?>">Chỉnh sửa</button>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="<?php echo  $row["PID"] ?>" tabindex="-1" aria-labelledby="addproductModalLabel" aria-hidden="true">
                    <form action="DeleteUpdate.php" action="get">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="addproductModalLabel">Chỉnh sửa thông tin sản phẩm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-6">
                                  <input name="pdid" type="text" class="form-control" id="pdid" value=<?php echo  $row["PID"] ?> style="display: none;">
                                  <label for="link-image" class="form-label">Link ảnh</label>
                                  <input name="image-link" type="text" class="btn news linkimg" placeholder="link to image" value=<?php echo  $row["IMAGE_URL"] ?>>
                                  <label for="select-cate" class="form-label">Danh mục</label>

                                  <select name="category" class="form-select" aria-label="Default select example">
                                    <option value="Cà Phê" <?php if ($row["CAT_NAME"] == "Cà Phê") {
                                                              echo "selected";
                                                            } else {
                                                              echo "";
                                                            } ?>>Cà phê</option>
                                    <option value="Trà Trái Cây - Trà Sữa" <?php if ($row["CAT_NAME"] == "Trà Trái Cây - Trà Sữa") {
                                                                              echo "selected";
                                                                            } else {
                                                                              echo "";
                                                                            } ?>>Trà trái cây - trà sữa</option>
                                    <option value="Đá Xay - Choco - Matcha" <?php if ($row["CAT_NAME"] == "Đá Xay - Choco - Matcha") {
                                                                              echo "selected";
                                                                            } else {
                                                                              echo "";
                                                                            } ?>>Đá xoay - choco - Matcha</option>
                                    <option value="Thưởng Thức Tại Nhà" <?php if ($row["CAT_NAME"] == "Thưởng Thức Tại Nhà") {
                                                                          echo "selected";
                                                                        } else {
                                                                          echo "";
                                                                        } ?>>Thưởng thức tại nhà</option>
                                  </select>
                                  <label for="quantity" class="form-label">Quantity</label>
                                  <input type="text" class="form-control" name="quantity" value=<?php echo  $row["QUANTITY"] ?>>
                                  <label for="fund" class="form-label">Fund</label>
                                  <input type="text" class="form-control" name="fund" value=<?php echo  $row["FUND"] ?>>
                                </div>

                                <div class="col-6">
                                  <form id="product-info">
                                    <div class="mb-3">
                                      <label for="name" class="form-label">Tên sản phẩm</label>
                                      <input name="name" type="text" class="form-control" value="<?php echo  $row["PRO_NAME"] ?>">
                                    </div>
                                    <div class=" mb-3">
                                      <label for="description" class="form-label">Mô tả</label>
                                      <textarea name="description" id="description" cols="22" rows="5"><?php echo  $row["DESCR"] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                      <label for="price" class="form-label">Giá</label>
                                      <input type="number" class="form-control" name="price" value=<?php echo  $row["PRICE"] ?>>
                                    </div>
                                    <div class="mb-3 form-check">
                                      <input name="isTop" type="checkbox" class="form-check-input" id="top-product" <?php if ($row["TOP_PRO"] == 1) {
                                                                                                                      echo "checked";
                                                                                                                    } else {
                                                                                                                      echo "";
                                                                                                                    } ?>>
                                      <label class="form-check-label" for="exampleCheck1">Sản phẩm hàng đầu</label>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input id="add-product" type="submit" name="delete" value="Xóa sản phẩm" class="btn btn-danger" data-bs-dismiss="modal" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <input id="add-product" type="submit" name="submit" value="Lưu" class="btn btn-primary" data-bs-dismiss="modal" />
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                <?php } ?>
              <?php  } ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </div>

  <footer>
    <div class="logoFooter">
      <p>Copyright 2021 by Sokoshop. All Rights Reserved.</p>
      <img id="logo" src="../images/logo.svg" alt="Logo"> Sokoshop
    </div>
  </footer>

  <script src="../js/ProductData.js"></script>
  <script src="../js/AddProduct.js"></script>
</body>


</html>