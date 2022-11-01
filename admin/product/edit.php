<?php

    require_once('./../../config/database.php');

    if (!isset($_SESSION['empID'])) {
        alert('Not allow', './login.php');
    }


    $id = $_GET['id'];

    $queryStr = "SELECT * FROM product WHERE ProductID = '$id'";
    $result = $db->query($queryStr);
    $product = $result->fetch_assoc();


    if (isset($_POST['btnEdit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];

        $queryStr = "UPDATE product
            SET name = '$name', price = '$price', qty = '$qty'
            WHERE ProductID = '$id';
        ";
        $result = $db->query($queryStr);

        if($result){
            alert('แก้ไขข้อมูลสำเร็จ', './index.php');
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
    <title>Bikeshop | Product </title>
    <link rel="stylesheet" href="./../../assets/css/global.css" />
    <?php include_once('./../../components/header.php'); ?>
</head>

<body>

    <?php include_once('./../../components/admin/navbar.php'); ?>

    <div class="container mt-5">

        <h3 class="text-center mb-4">แก้ไขสินค้า</h3>

        <form method="POST" action="./edit.php?id=<?php echo $id; ?>" style="width:400px;" class="m-auto">
            <div class="mb-3">
                <label class="form-label">NameProduct</label>
                <input name="name" type="text" value="<?php echo $product['name'] ?>" class="form-control"
                    placeholder="กรอกชื่อสินค้า" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input name="price" type="text" value="<?php echo $product['price'] ?>" class="form-control"
                    placeholder="กรอกราคาสินค้า" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Qty</label>
                <input name="qty" type="number" value="<?php echo $product['qty'] ?>" class="form-control"
                    placeholder="กรอกจำนวนสินค้า" required>
            </div>

            <button name="btnEdit" type="submit" class="btn btn-primary w-full mt-3">Edit</button>
            <a href="./index.php" class="btn btn-secondary w-full mt-2">Back</a>

        </form>


    </div>

</body>

</html>