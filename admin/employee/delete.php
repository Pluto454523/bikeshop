<?php 

    require_once ('./../../config/database.php');

    $id = $_GET['id'];

    $queryStr = "DELETE FROM employee WHERE EmployeeID = '$id';";
    $result = $db->query($queryStr);
    
    if($result){
        alert('ลบสำเร็จ', './index.php');
    } else {
        alert('ลบไม่สำเร็จ');
    }

?>