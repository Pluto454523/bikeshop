<?php
    require_once ('./../../config/database.php');
    
    if (!isset($_SESSION['empID'])) {
        alert('Not allow', './login.php');
    }

    $queryStr = "SELECT * FROM salesdata";
    $data_sale = $db->query($queryStr);

?>

<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikeshop | HISTORY </title>
    <link rel="stylesheet" href="./../../assets/css/global.css" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <?php include_once('./../../components/header.php'); ?>
</head>

<body>

    <?php include_once('./../../components/admin/navbar.php'); ?>


    <div class="container mt-5">
        <div class="text-center mb-4">
            <h3>ประวัติการสั่งซื้อสินค้าจากลูกค้า</h3>
            <div class="w-full mt-14">
                <table class="table table-bordered table-striped">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6 rounded-l-lg">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6 rounded-l-lg">
                                สินค้า
                            </th>
                            <th scope="col" class="py-3 px-6 rounded-l-lg">
                                ผู้ซื้อ
                            </th>
                            <th scope="col" class="py-3 px-6 rounded-l-lg">
                                ที่อยู่
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
                            <th scope="col" class="py-3 px-6 rounded-r-lg text-center">
                                ยกเลิก
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            $total_price = 0;
                            while ($sale = $data_sale->fetch_assoc()):
                                $detail_id = $sale['DetailID'];
                                $detail = "SELECT * FROM detailsale WHERE DetailID = $detail_id";
                                $detail = $db->query($detail);
                                $detail = $detail->fetch_assoc();
                                
                                $product_id = $detail['ProductID'];
                                $product = "SELECT * FROM product WHERE ProductID = $product_id";
                                $product = $db->query($product);
                                $product = $product->fetch_assoc();
                                
                                $customer_id = $sale['CustomerID'];
                                $customer = "SELECT * FROM customer WHERE CustomerID = $customer_id";
                                $customer = $db->query($customer);
                                $customer = $customer->fetch_assoc();

                                
                                
                                $total_price += floatval($detail['pricebaht']);
                        ?>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $i++; ?>
                            </th>
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="./../product/edit.php?id=<?php echo $product['ProductID']; ?>"
                                    class="text-black">
                                    <?php echo $product['name']; ?>
                                </a>
                            </td>
                            <td scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="./../customer/edit.php?id=<?php echo $customer['CustomerID']; ?>"
                                    class="text-black">
                                    <?php echo $customer['fname'] . ' ' . $customer['lname'];  ?>
                                </a>

                            </td>
                            <td class="py-4 px-6 text-gray-900 ">
                                <?php echo $customer['address']; ?>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <?php echo $detail['quantity']; ?>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <?php echo number_format($product['price']); ?>
                            </td>
                            <th class="py-4 px-6 text-center">
                                <?php echo number_format($detail['pricebaht']); ?>
                            </th>
                            <th class="py-4 px-6 text-center">
                                <a
                                    href="./delete.php?product_id=<?php echo $product_id; ?>&detail_sale_id=<?php echo $detail_id; ?>&data_sale_id=<?php echo $sale['SaleID']; ?>&qty=<?php echo $detail['quantity']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </th>
                        </tr>
                        <?php 
                            endwhile;
                        ?>

                        <?php 
                            if ($i == 1):
                        ?>
                        <tr class="bg-white dark:bg-gray-800 w-full text-center">
                            <td colspan="7" class="py-5 text-blue-900">- ไม่พบข้อมูลสั่งซื้อ -</td>
                        </tr>
                        <?php 
                            endif;
                        ?>

                    </tbody>
                    <tfoot class="border-y-2">
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <td colspan="4"></td>
                            <th scope="row" class="py-3 px-6 text-base text-right">ยอมรวม</th>
                            <td class="underline text-red-800 py-3 px-6 text-center text-lg">
                                <?php echo number_format($total_price) ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>

    </div>


</body>

</html>