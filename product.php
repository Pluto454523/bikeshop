<?php
require_once "./config/database.php";

$id = $_GET["id"];
if (!$id) {
    alert("ไม่พบข้อมูลสินค้า", "./index.php");
}

$queryStr = "SELECT * FROM product WHERE ProductID = '$id'";
$data_product = $db->query($queryStr);
$data_product = $data_product->fetch_assoc();

$queryStr = "SELECT * FROM productpictures WHERE ProductID = '$id'";
$data_picture = $db->query($queryStr);
$mainImg = $db->query($queryStr);
$mainImg = $mainImg->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKESHOP | PRODUCT</title>
    <?php include_once "./components/header.php"; ?>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body>

    <?php include_once "./components/navbar.php"; ?>


    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 border-end">

                            <div class="images p-3">
                                <div class="text-center p-4">
                                    <img id="main_product_image" src="<?php echo $mainImg
                                    ? $mainImg["source"]
                                    : "./assets/img/no_img.jpg"; ?>" width="350">
                                </div>
                                <div class="thumbnail text-center">
                                    <?php while (
                                    $pic = $data_picture->fetch_assoc()
                                ):
                                    echo '<img onclick="changeImage(this)" src="' .
                                        $pic["source"] .
                                        '" width="70"> ';
                                endwhile; ?>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-6 relative">

                            <div class="product p-4">
                                <div class="mt-4 mb-3">
                                    <h5 class="text-uppercase"><?php echo $data_product["name"]; ?></h5>
                                    <div class="price d-flex flex-row align-items-center">
                                        <span
                                            class="act-price">฿<?php echo number_format($data_product["price"]); ?></span>
                                    </div>
                                </div>
                                <p class="about">คงเหลือ : <?php echo number_format($data_product["qty"]); ?></p>

                                <?php 
                                if (isset($_SESSION['cusID'])) {
                                    echo '
                                    <form method="POST" action="./order.php?id=' .$data_product['ProductID']. '">
                                        <input name="price" value="' .$data_product['price']. '" type="hidden" />
                                        <input name="qty" value="1" type="number" class="form-control w-40" min="0" placeholder="จำนวน" />
                                        <div class="cart mt-4 align-items-center"> 
                                            <button onclick="alertConfirmOrder()" class="btn btn-danger text-uppercase mr-2 px-4">สั่งซื้อสินค้า</button>
                                        </div>
                                    </form>
                                    ';
                                } else {
                                    echo '
                                    <p class="about">** สินค้าทุกชินเก็บเงินปลายทาง</p>
                                    <a href="./login.php" class="btn btn-danger text-uppercase mr-2 px-4">!! กรุณาเข้าสู่ระบบก่อนซื้อสินค้า</a>
                                    ';
                                }
                                
                                ?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>







<script>
function alertConfirmOrder() {
    if (confirm('คุณต้องการสั่งสินค้าใช่หรือไม่')) {
        document.querySelector('#confirmOrder').click();
    }
}

function changeImage(element) {
    var main_prodcut_image = document.getElementById('main_product_image');
    main_prodcut_image.src = element.src;
}
</script>