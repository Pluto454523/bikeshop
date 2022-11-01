<?php
    require_once ('./../../config/database.php');
    
    if (!isset($_SESSION['empID'])) {
        alert('Not allow', './login.php');
    }

    $queryStr = "SELECT * FROM customer";
    $result = $db->query($queryStr);

?>

<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikeshop | Customer </title>
    <link rel="stylesheet" href="./../../assets/css/global.css" />
    <?php include_once('./../../components/header.php'); ?>
</head>

<body>

    <?php include_once('./../../components/admin/navbar.php'); ?>

    <div class="container mt-5">

        <div class="d-flex justify-content-end">
            <a href="./add.php" class="btn btn-success">เพิ่มสมาชิก</a>
        </div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">fName</th>
                    <th scope="col">lname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Tel</th>
                    <th scope="col">username</th>
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
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                        <div class="flex gap-2 justify-center">
                            <a href="./edit.php?id=<?php echo $row['CustomerID']; ?>">
                                <i class="fa-solid fa-pen-to-square text-warning"></i>
                            </a>
                            <a href="./delete.php?id=<?php echo $row['CustomerID']; ?>">
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