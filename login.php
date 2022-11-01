<?php
    require_once ('./config/database.php');
    

    if ( isset( $_POST['btnLogin'] ) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $queryStr = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
        $result = $db->query($queryStr);

        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();

            $_SESSION['cusID'] = $result['CustomerID'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['firstname'] = $result['fname'];

            alert('เข้าสู่ระบบสำเร็จ', './index.php');

            

        } else {
            alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
        }
        
    } 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKESHOP | LOGIN</title>
    <?php include_once('./components/header.php'); ?>
</head>

<body>

    <?php include_once('./components/navbar.php') ?>


    <div class="container mt-5">
        <h3 class="text-center mb-4">เข้าสู่ระบบ</h3>

        <form method="POST" action="./login.php" style="width:400px;" class="m-auto">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="username" type="text" class="form-control" aria-describedby="emailHelp"
                    placeholder="กรอกชื่อผู้ใช้งาน" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" placeholder="กรอกรหัสผ่าน" required>
            </div>

            <button name="btnLogin" type="submit" class="btn btn-primary w-full mt-3">Login</button>
            <div style="width: 100%; text-align: right" class="mt-2">
                <a href="./admin/login.php">สำหรับเจ้าหน้าที่</a>
            </div>

        </form>

    </div>


</body>

</html>