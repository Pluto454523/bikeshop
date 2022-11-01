<?php
require_once('./../../../config/database.php');

if (!isset($_SESSION['empID'])) {
    alert('Not allow', './login.php');
}


$id = $_GET['id'];
    
$queryStr = "SELECT * FROM product WHERE ProductID = '$id'";
$data_product = $db->query($queryStr);
$data_product = $data_product->fetch_assoc();

if (isset($_POST['btnAddImg'])) {

    $img_base64 = $_POST['img_base64'];

    $queryStr = "INSERT INTO productpictures (source,ProductID) 
              VALUE ('$img_base64', '$id')";
    $result = $db->query($queryStr);

    if($result){
        alert('เพิ่มรูปภาพสำเร็จ', './view.php?id='.$id);
    } else {
        alert('เพิ่มรูปภาพไม่สำเร็จ');
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
    <link rel="stylesheet" href="./../../../assets/css/global.css" />
    <?php include_once('./../../../components/header.php'); ?>
</head>

<body>

    <?php include_once('./../../../components/admin/navbar.php'); ?>

    <div class="container mt-5">

        <h3 class="text-center mb-4">เพิ่มรูปภาพสินค้า : <?php echo $data_product['name']; ?></h3>

        <form method="POST" action="./add.php?id=<?php echo $id; ?>" enctype="multipart/form-data" style="width:400px;" class="m-auto">
            <div class="mb-3">
                <label class="form-label">เลือกรูปภาพ</label>
                <input id="img_base64" name="img_base64" type="hidden" />
                <input id="fileImage" name="file" type="file" class="form-control"  placeholder="กรอกชื่อสินค้า" required>
                <img id="img_preview" src="" alt="" width="100%">
                <div id="btnDelImg" onclick="setImagePreview()" class="d-none w-full mt-3 btn btn-danger">ลบรูปภาพ</div>
            </div>

            <button name="btnAddImg" type="submit" class="btn btn-primary w-full mt-3">Add Image</button>
            <a href="./view.php" class="btn btn-secondary w-full mt-2">Back</a>
        </form>

    </div>

</body>

</html>


<script type="text/javascript">

    const toBase64 = file => new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
    });

    const setImagePreview = (base64 = null) => {
        const img_preview = document.querySelector('#img_preview');
        const btn_delImg = document.querySelector('#btnDelImg');
        img_preview.src = base64;
        img_preview.style.height = base64 ? 500 : 0;
        base64 ? btn_delImg.classList.remove('d-none') : btn_delImg.classList.add('d-none');
    }

    document.querySelector('#fileImage').addEventListener('change', async (event) => {
        if (event.target.files[0]) {
            let base64 = await toBase64(event.target.files[0]);
            document.querySelector('#img_base64').value = base64;
            setImagePreview(base64);
        } else {
            setImagePreview();
        }
    });

</script>