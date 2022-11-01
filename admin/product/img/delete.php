<?php 

    require_once ('./../../../config/database.php');

    $pd_id = $_GET['pd_id'];
    $pic_id = $_GET['pic_id'];

    $queryStr = "DELETE FROM productpictures WHERE PictureID = '$pic_id';";
    $result = $db->query($queryStr);
    
    if($result){
        alert('ลบรูปภาพสินค้าสำเร็จ', './view.php?id='.$pd_id);
    } else {
        alert('ลบรูปภาพสินค้าไม่สำเร็จ');
    }

?>

