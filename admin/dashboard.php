<?php
    require_once('./../config/database.php');

    if (!isset($_SESSION['empID'])) {
        alert('Not allow', './login.php');
    }

    $queryStr = "SELECT * FROM detailsale;";
    $sale = $db->query($queryStr);
    $total_sale = 0;
    while ($row = $sale->fetch_assoc()) {
        $total_sale += $row['pricebaht'];
    }

    $queryStr = "SELECT COUNT(*) as count FROM product";
    $product = $db->query($queryStr);
    $product = $product->fetch_assoc();

    $queryStr = "SELECT COUNT(*) as count FROM customer";
    $customer = $db->query($queryStr);
    $customer = $customer->fetch_assoc();

    $queryStr = "SELECT COUNT(*) as count FROM employee";
    $employee = $db->query($queryStr);
    $employee = $employee->fetch_assoc();

    

?>

<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKESHOP | DASHBOARD</title>
    <?php include_once('./../components/header.php'); ?>
</head>

<body>

    <?php include_once('./../components/admin/navbar.php'); ?>

    <div class="container jumbotron" style="margin-top: 80px;">
        <div class="row w-100">
            <div class="col-md-3">
                <div class="card border-danger mx-sm-1 p-3">
                    <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa-solid fa-coins"
                            aria-hidden="true"></span></div>
                    <div class="text-danger text-center mt-3">
                        <h4>Income</h4>
                    </div>
                    <div class="text-danger text-center mt-2">
                        <h1><?php echo number_format($total_sale) ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="card border-info shadow text-info p-3 my-card"><span class="fa-brands fa-product-hunt"
                            aria-hidden="true"></span></div>
                    <div class="text-info text-center mt-3">
                        <h4>Product</h4>
                    </div>
                    <div class="text-info text-center mt-2">
                        <h1><?php echo $product['count']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="card border-success shadow text-success p-3 my-card"><span class="fa-solid fa-users"
                            aria-hidden="true"></span></div>
                    <div class="text-success text-center mt-3">
                        <h4>Customer</h4>
                    </div>
                    <div class="text-success text-center mt-2">
                        <h1><?php echo $customer['count']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning mx-sm-1 p-3">
                    <div class="card border-warning shadow text-warning p-3 my-card"><span class="fa-solid fa-user-gear"
                            aria-hidden="true"></span></div>
                    <div class="text-warning text-center mt-3">
                        <h4>Employee</h4>
                    </div>
                    <div class="text-warning text-center mt-2">
                        <h1><?php echo $employee['count']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>



<style>
.my-card {
    position: absolute;
    left: 40%;
    top: -20px;
    border-radius: 50%;
}
</style>