<?php
require_once('./../../config/database.php');

if (!isset($_SESSION['empID'])) {
    alert('Not allow', './login.php');
}


if (isset($_POST['btnAddEmp'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $username = $_POST['username'];

    $queryStr = "INSERT INTO employee (fname,lname,address,tel,username) 
              VALUE ('$fname','$lname','$address','$tel','$username')";
    $result = $db->query($queryStr);

    if($result){
        alert('เพิ่มสมาชิกสำเร็จ', './index.php');
    } else {
        alert('เพิ่มสมาชิกไม่สำเร็จ');
    }
}  




?>

<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikeshop | AddEmployee </title>
    <link rel="stylesheet" href="./../../assets/css/global.css" />
    <?php include_once('./../../components/header.php'); ?>
</head>

<body>

    <?php include_once('./../../components/admin/navbar.php'); ?>

    <div class="container mt-5">

        <h3 class="text-center mb-4">เพิ่มพนักงาน</h3>

        <form method="POST" action="./add.php" style="width:400px;" class="m-auto">
            <div class="mb-3">
                <label class="form-label">ชื่อจริง</label>
                <input name="fname" type="text" class="form-control" placeholder="กรอกชื่อจริง" required>
            </div>
            <div class="mb-3">
                <label class="form-label">นามสกุล</label>
                <input name="lname" type="text" class="form-control" placeholder="กรอกนามสกุล" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ที่อยู่</label>
                <input name="address" type="text" class="form-control" placeholder="กรอกที่อยู่" required>
            </div>
            <div class="mb-3">
                <label class="form-label">เบอร์โทรศัพท์</label>
                <input name="tel" type="text" class="form-control" placeholder="กรอกเบอร์โทรศัพท์" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input name="username" type="text" class="form-control" placeholder="กรอกชื่อผู้ใช้" required>
            </div>

            <button name="btnAddEmp" type="submit" class="btn btn-primary w-full mt-3">AddEmployee</button>
            <a href="./index.php" class="btn btn-secondary w-full mt-2">Back</a>

        </form>


    </div>

</body>

</html>