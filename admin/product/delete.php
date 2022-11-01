<?php 

    require_once ('./../../config/database.php');

    $id = $_GET['id'];

    $queryStr = "DELETE FROM product WHERE ProductID = '$id'";
    $result = $db->query($queryStr);

    if($result){
        alert('ลบสินค้าสำเร็จ', './index.php');
    } else {
        alert('ลบสินค้าไม่สำเร็จ');
    }

    $queryStr = "DELETE FROM productpictures WHERE ProductID = '$id'";
    $result = $db->query($queryStr);
    
?>