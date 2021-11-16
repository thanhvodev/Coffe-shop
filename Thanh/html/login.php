<!DOCTYPE html>
<html lang="en">

<head>
    <title>How To Create Simple Login Form Design In Bootstrap 5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4 shadow rounded">
                    <form action="" method="" class="row g-3">
                        <h4>Quản lý đăng nhập</h4>
                        <div class="col-12">
                            <label>Tài khoản</label>
                            <input type="text" name="username" class="form-control" placeholder="Tài khoản">
                        </div>
                        <div class="col-12">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Ghi nhớ</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="top-product.php" class="text-decoration-none text-white btn btn-dark float-end" role="button">Đăng
                                nhập</a>
                        </div>
                    </form>
                    <!-- <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Have not account yet? <a href="#">Signup</a></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>