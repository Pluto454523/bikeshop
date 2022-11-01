<?php
    require_once ('./../config/database.php');
    

    if ( isset( $_POST['btnLogin'] ) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $queryStr = "SELECT * FROM employee WHERE username = '$username' AND password = '$password'";
        $result = $db->query($queryStr);

        if ($result->num_rows > 0) {
            $result = $result->fetch_assoc();
            
            $_SESSION['empID'] = $result['EmployeeID'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['firstname'] = $result['fname'];

            alert('เข้าสู่ระบบสำเร็จ', './dashboard.php');
        } else {
            alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
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
    <title>BIKESHOP | LOGIN</title>
    <?php include_once('./../components/header.php'); ?>
</head>

<body>

    <div class="container mt-5">
        <h3 class="text-center mb-4">เข้าสู่ระบบสำหรับเจ้าหน้าที่</h3>

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

            <button name="btnLogin" type="submit" class="btn btn-primary mt-3" style="width: 100%;">Login</button>
            <a href="./../index.php" class="btn btn-secondary mt-2" style="width: 100%;">Back</a>

        </form>

    </div>


</body>

</html>