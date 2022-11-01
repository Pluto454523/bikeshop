<?php

    require_once('./../../config/database.php');

    if (!isset($_SESSION['empID'])) {
        alert('Not allow', './login.php');
    }


    $id = $_GET['id'];

    $queryStr = "SELECT * FROM employee WHERE EmployeeID = '$id'";
    $result = $db->query($queryStr);
    $employee = $result->fetch_assoc();


    if (isset($_POST['btnEditEmp'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $username = $_POST['username'];
        

        $queryStr = "UPDATE employee
            SET fname = '$fname', lname = '$lname', address = '$address' , tel = '$tel' , username = '$username'
            WHERE EmployeeID = '$id'
        ";
        $result = $db->query($queryStr);
        // echo ($queryStr);
        if($result){
            alert('แก้ไขข้อมูลพนักงานสำเร็จ', './index.php');
        } else {
            alert('เกิดข้อผิดพลาด');
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
    <title>Bikeshop | Customer </title>
    <link rel="stylesheet" href="./../../assets/css/global.css" />
    <?php include_once('./../../components/header.php'); ?>
</head>

<body>

    <?php include_once('./../../components/admin/navbar.php'); ?>

    <div class="container mt-5">

        <h3 class="text-center mb-4">แก้ไขข้อมูลพนักงาน</h3>

        <form method="POST" action="./edit.php?id=<?php echo $id; ?>" style="width:400px;" class="m-auto">
            <div class="mb-3">
                <label class="form-label">ชื่อจริง</label>
                <input name="fname" type="text" value="<?php echo $employee['fname'] ?>" class="form-control"
                    placeholder="แก้ไขชื่อจริง" required>
            </div>
            <div class="mb-3">
                <label class="form-label">นามสกุล</label>
                <input name="lname" type="text" value="<?php echo $employee['lname'] ?>" class="form-control"
                    placeholder="แก้ไขนามสกุล" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ที่อยู่</label>
                <input name="address" type="text" value="<?php echo $employee['address'] ?>" class="form-control"
                    placeholder="แก้ไขที่อยู่" required>
            </div>

            <div class="mb-3">
                <label class="form-label">เบอร์โทรศัพท์</label>
                <input name="tel" type="text" value="<?php echo $employee['tel'] ?>" class="form-control"
                    placeholder="แก้ไขเบอร์โทร" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input name="username" type="text" value="<?php echo $employee['username'] ?>" class="form-control"
                    placeholder="แก้ไขชื่อผู้ใช้งาน" required>
            </div>


            <button name="btnEditEmp" type="submit" class="btn btn-primary w-full mt-3">Edit</button>
            <a href="./index.php" class="btn btn-secondary w-full mt-2">Back</a>

        </form>


    </div>

</body>

</html>