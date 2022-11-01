<?php
    require_once ('./../../../config/database.php');
    
    if (!isset($_SESSION['empID'])) {
        alert('Not allow', './login.php');
    }


    $id = $_GET['id'];
    
    $queryStr = "SELECT * FROM product WHERE ProductID = '$id'";
    $data_product = $db->query($queryStr);
    $data_product = $data_product->fetch_assoc();

    $queryStr = "SELECT * FROM productpictures WHERE ProductID = '$id'";
    $data_picture = $db->query($queryStr);
    
?>

<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikeshop | Product </title>
    <link rel="stylesheet" href="./../../../assets/css/global.css" />
    <link rel="stylesheet" href="./../../../assets/css/tailwind.css" />
    <?php include_once('./../../../components/header.php'); ?>
</head>
<body>

    <?php include_once('./../../../components/admin/navbar.php'); ?>
  
    <div class="container mt-5">

        <div class="d-flex justify-content-end">
            <a href="./add.php?id=<?php echo $id; ?>" class="btn btn-success">เพิ่มรูปภาพสินค้า</a>
        </div>


        <div>
            <span class="fs-5">รูปภาพสินค้า : </span> 
            <span class="text-primary text-2xl">
                <?php echo $data_product['name'] ?>
            </span>
        </div>


        <div class="row gap-4 mt-4 justify-content-center">
            <?php 
                $i = 1;
                if ($data_picture):
                    while ($row = $data_picture->fetch_assoc()):
                        $i++;
                        ?>
                
                <div style="position: relative; width: 600px; height: 400px;">
                    <a href="./delete.php?pd_id=<?php echo $row['ProductID']; ?>&pic_id=<?php echo $row['PictureID'] ?>" style="position: absolute; right: 24px; top: 14px;">
                        <i class="fa-solid fa-trash text-danger fs-4"></i>
                    </a>
                    <img src="<?php echo $row['source']; ?>" style="width: 100%; height: 100%; object-fit: cover" class="shadow-md" />
                </div>
                
                <?php 
                    endwhile; 
                endif;        
            ?>
        </div>

        <?php 
            if ($i == 1):
        ?>

            <p class="text-center mt-5">- ยังไม่มีรูปภาพสินค้า -</p>

        <?php 
            endif; 
        ?>

    </div>

    <div class="space mt-5 mb-5"></div>

</div>

</body>
</html>