<?php
// Connect database
    $serverName = 'localhost';
    $userName   = 'root';
    $password   = '';
    $dbName     = 'sokoshop';
    $check = true;

    $db = mysqli_connect($serverName, $userName, $password, $dbName);

    if (!$db) {
        die('Không thể kết nối: ' . mysqli_connect_error());
        exit();
    }
    
    function update_payment_total($id){
        global $db;
        $query = 'UPDATE `order`
        SET `order`.`TOTAL` = (SELECT abc.`sum` FROM (SELECT `order`.`ID_ORDER` AS `id`, SUM(`product`.`PRICE` * `product_in_order`.`QUANTITY`) AS `sum` 
              FROM `order`, `product_in_order`, `product` 
              WHERE `product_in_order`.`PID` = `product`.`PID` AND `product_in_order`.`ID_ORDER` = `order`.`ID_ORDER` AND `order`.`ID_ORDER` = ' . (int)$id .
              ' GROUP BY `product_in_order`.`ID_ORDER`) AS abc)
        WHERE `order`.`ID_ORDER` = ' . (int)$id;
        mysqli_query($db, $query);
    }
    for($i = 0; $i < 12384; $i++){
        update_payment_total($i + 1);
    }
    /*
    for($i = 0; $i < 383; $i++){
        update_payment_total($i + 1);
    }
*/

    mysqli_close($db);
    header("location: ../../Tan_Toan/");
?>