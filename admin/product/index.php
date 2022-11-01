<?php
    require_once ('./../../config/database.php');
    
    if (!isset($_SESSION['empID'])) {
        alert('Not allow', './login.php');
    }


    $queryStr = "SELECT * FROM product";
    $result = $db->query($queryStr);

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

        <div class="d-flex justify-content-end">
            <a href="./add.php" class="btn btn-success">เพิ่มสินค้า</a>
        </div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Preorder</th>
                    <th scope="col">Qty</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">


                <?php 
                    $i = 1;
                    while ($row = $result->fetch_assoc()):
                ?>

                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['preorder']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="./img/view.php?id=<?php echo $row['ProductID']; ?>">
                                <i class="fa-solid fa-image"></i>
                            </a>
                            <a href="./edit.php?id=<?php echo $row['ProductID']; ?>">
                                <i class="fa-solid fa-pen-to-square text-warning"></i>
                            </a>
                            <a href="./delete.php?id=<?php echo $row['ProductID']; ?>">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <?php endwhile; ?>


            </tbody>
        </table>
    </div>

</body>

</html>