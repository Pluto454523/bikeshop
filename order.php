<?php 
    require_once('./config/database.php');

    $productID = $_GET['id'];
    $customerID = $_SESSION['cusID'];
    $qty = $_POST['qty'];
    $price = floatval($_POST['price']) * intval($qty);

    $queryUpdateProduct = "UPDATE product SET qty = (qty - $qty) WHERE ProductID = '$productID'";
    $result_updateProduct = $db->query($queryUpdateProduct);

    $queryInsertDetailSell = "INSERT INTO detailsale (pricebaht, quantity, ProductID)
                VALUE ('$price', '$qty', '$productID')";
    $result_recodeDetailSell = $db->query($queryInsertDetailSell);

    $queryGetNowDetailSell = "SELECT DetailID FROM detailsale ORDER BY DetailID DESC LIMIT 1";
    $DetailID = $db->query($queryGetNowDetailSell);
    $DetailID = $DetailID->fetch_assoc();
    $DetailID = $DetailID['DetailID'];
    
    $queryInsertSale = "INSERT INTO salesdata (CustomerID, DetailID)
                VALUE ('$customerID', '$DetailID')";
    $result_recodeDataSale = $db->query($queryInsertSale);
    
    alert('สั่งซื้อสินค้าสำเร็จ', './history.php');

?>