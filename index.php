<?php 
    require_once ('./config/database.php');

    $queryStr = "SELECT * FROM product";
    $data_products = $db->query($queryStr);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKESHOP | HOME</title>
    <?php include_once ('./components/header.php'); ?>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body>

    <?php   include_once ('./components/navbar.php') ?>

    <img src="./assets/img/l2_bikes_th.webp" class="img-fluid rounded" alt="Responsive image">
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php   
                            while($row = $data_products->fetch_assoc()): 
                                
                                $rowID = $row['ProductID'];

                                $queryStr = "SELECT * FROM productpictures WHERE ProductID = '$rowID' LIMIT 1";
                                // echo $queryStr;
                                $img_product = $db->query($queryStr);
                                $img_product = $img_product->fetch_assoc();

                    ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top"
                            src="<?php echo ($img_product ? $img_product['source'] : './assets/img/no_img.jpg'); ?>"
                            alt="...">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $row['name']; ?></h5>
                                <!-- Product price-->
                                ฿ <?php echo number_format($row['price']); ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="./product.php?id=<?php echo $row['ProductID']; ?>">สั่งซื้อสินค้า</a></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <div class="flex flex-col justify-center h-[100px] mt-3 w-full bg-[#222] text-white  text-center  ">
        Copyright 2001-2020 Home Product Center Public Company Limited. All rights reserved.


    </div>

</body>

</html>