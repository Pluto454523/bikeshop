<?php
    require_once ('./config/database.php');


    if (isset($_POST['btnRegister'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];

        $queryStr = "INSERT INTO customer (fname,lname,address,tel,username,password) 
                  VALUES ('$firstname','$lastname','$address','$telephone','$username','$password')";
        $result = $db->query($queryStr);

        if($result){
            alert('สมัครสมาชิกสำเร็จ', './login.php');
        } else {
            alert('สมัครสมาชิกไม่สำเร็จ');
        }
    }  
        

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKESHOP | REGISTER</title>
    <?php include_once('./components/header.php'); ?>
</head>

<body>

    <?php include_once('./components/navbar.php') ?>


    <div class="container mt-5">
        <h3 class="text-center mb-4">สมัครสมาชิก</h3>

        <form method="POST" action="./register.php" style="width:400px;" class="m-auto">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="username" type="text" class="form-control" aria-describedby="emailHelp"
                    placeholder="กรอกชื่อผู้ใช้งาน" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" placeholder="กรอกรหัสผ่าน" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Firstname</label>
                <input name="firstname" type="text" class="form-control" placeholder="กรอกชื่อจริงของคุณ" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Lastname</label>
                <input name="lastname" type="text" class="form-control" placeholder="กรอกนามสกุลของคุณ" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input name="address" type="text" class="form-control" placeholder="กรอกที่อยู่ของคุณ" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telephone</label>
                <input name="telephone" type="text" class="form-control" placeholder="กรอกเบอร์โทรศัพท์ของคุณ" required>
            </div>

            <button name="btnRegister" type="submit" class="btn btn-primary w-full mt-3">Register</button>
        </form>

    </div>

</body>

</html>