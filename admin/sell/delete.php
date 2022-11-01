<?php 

    require_once ('./../../config/database.php');

    $detail_sale_id = $_GET['detail_sale_id'];
    $data_sale_id = $_GET['data_sale_id'];
    $qty = $_GET['qty'];
    // $productID = $_GET['prouct_id'];

    $queryStr = "DELETE FROM salesdata WHERE SaleID = '$data_sale_id'";
    $result1 = $db->query($queryStr);
    $queryStr = "DELETE FROM detailsale WHERE DetailID = '$detail_sale_id'";
    $result2 = $db->query($queryStr);
    
    // $queryUpdateProduct = "UPDATE product SET qty = (qty + $qty) WHERE ProductID = '$productID'";
    // $result3 = $db->query($queryUpdateProduct);
    
    if($result1 && $result2){
        alert('ยกเลิกสำเร็จ', './index.php');
    } else {
        alert('ยกเลิกไม่สำเร็จ');
    }

?>