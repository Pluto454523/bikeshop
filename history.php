<?php 
    require_once ('./config/database.php');

    if(!isset($_SESSION['cusID'])) {

        alert('คุณยังไม่ได้เข้าสู่ระบบ', './login.php');

    } else {

        $customerID = $_SESSION['cusID'];
        $queryStr = "SELECT * FROM salesdata WHERE CustomerID = '$customerID'";
        $data_sale = $db->query($queryStr);
    
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKESHOP | HISTORY</title>
    <?php include_once ('./components/header.php'); ?>
</head>

<body>

    <?php 
    if(isset($_SESSION['cusID'])) {
    include_once ('./components/navbar.php');?>

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h3>ประวัติการสั่งซื้อ</h3>
            <div class="w-full mt-14">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 px-6 rounded-l-lg">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6 rounded-l-lg">
                                ชื่อสินค้า
                            </th>
                            <th scope="col" class="py-3 px-6 text-center">
                                จำนวน
                            </th>
                            <th scope="col" class="py-3 px-6 rounded-r-lg text-center">
                                ราคาต่อชิ้น
                            </th>
                            <th scope="col" class="py-3 px-6 rounded-r-lg text-center">
                                ราคารวม
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            $total_price = 0;
                            while ($sale = $data_sale->fetch_assoc()):
                                // echo json_encode($sale);
                                $detail_id = $sale['DetailID'];
                                $detail = "SELECT * FROM detailsale WHERE DetailID = $detail_id";
                                $detail = $db->query($detail);
                                $detail = $detail->fetch_assoc();
                                
                                $product_id = $detail['ProductID'];
                                $product = "SELECT * FROM product WHERE ProductID = $product_id";
                                $product = $db->query($product);
                                $product = $product->fetch_assoc();
                                $total_price += floatval($detail['pricebaht']);
                        ?>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $i++; ?>
                            </th>
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $product['name']; ?>
                            </th>
                            <td class="py-4 px-6 text-center">
                                <?php echo $detail['quantity']; ?>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <?php echo number_format($product['price']); ?>
                            </td>
                            <th class="py-4 px-6 text-center">
                                <?php echo number_format($detail['pricebaht']); ?>
                            </th>
                        </tr>
                        <?php 
                            endwhile;
                        ?>
                    </tbody>
                    <tfoot class="border-y-2">
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <td colspan="3"></td>
                            <th scope="row" class="py-3 px-6 text-base text-right">ยอมรวม</th>
                            <td class="underline text-red-800 py-3 px-6 text-center text-lg">
                                <?php echo number_format($total_price) ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <a href="./index.php" class="btn btn-secondary">กลับหน้าหลัก</a>
        </div>

    </div>

    <?php } ?>


</body>

</html>