<?php 
    require ('./database/config.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSql </title>
</head>

<body>
    <?php

        if($result = $db->query('SELECT * FROM product')){
            if ($result->num_rows){
                    // while( $row = $result->fetch_assoc()){
                    //     echo '<br>'. $row['fname'] , ' ' , $row['address'] . '<br>';
                    // }

                    $row = $result->fetch_all(MYSQLI_ASSOC);
                    
                    foreach ($row as $rows) {
                       echo '<br>'. $rows['Name'] , ' ' , $rows['Price'], ' ', $rows['Qty'] , '<br>';
                    }

                    echo '<pre>' , print_r($row) , '</pre>';
                    
            }else {
                echo "No information";
            }    

        } else {
            echo '<br>','Failed' , '<br>';
            die($db->error);
        }

    ?>
</body>

</html>