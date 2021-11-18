<?php
    // Connect database
    $serverName = 'localhost';
    $userName   = 'root';
    $password   = '';
    $dbName     = 'sokoshop';
    $cost = null;
    $db = mysqli_connect($serverName, $userName, $password, $dbName);
    $date = $_GET['date'];
    $getdate = $_GET['getday'];
    if (!$db) {
        die('Không thể kết nối: ' . mysqli_connect_error());
        exit();
    }
    function get_fee_in_day($date)
    {   
        global $db, $cost;
        $query =    "SELECT `cost`.`CATEGORY` AS `decs`, `cost`.`PRICE` AS `price`, `cost`.`QUANTITY` AS `number`, (`cost`.`PRICE` * `cost`.`QUANTITY`) AS `total`
                    FROM `cost`
                    WHERE `cost`.`DTIME` = \"" . $date . "\"";
        $cost = mysqli_query( $db, $query);
    }
    $total = 0;
    $i = 1;
    get_fee_in_day($date);
    echo '<div class="modal-header"><h2>Ngày ' . $getdate . '</h2><span class="close">&times;</span></div><div class="modal-body">' . '<table class="table table-striped"><thead><tr><th>Số thứ tự</th><th>Nội dung</th><th>Đơn giá</th><th>Số lượng</th><th>Tổng cộng</th></thead><tbody>';
    foreach ($cost as $cos) {
        $total += $cos['total'];
        echo "<tr><td>#" . $i . "</td><td>" . $cos['decs'] . "</td><td>" . $cos['price'] . "</td><td>" . $cos['number'] . "</td><td>" . $cos['total'] . "</td></tr>";
        $i += 1;
    }
    echo '</tbody></table></div><div class="modal-footer"><h3>Tổng cộng: ' . $total . '</h3></div>';
    mysqli_close($db);
?>