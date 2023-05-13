<?php 

require('db/koneksi.php');
    
if(isset($_POST['tambah'])){
    $id = $_POST['id_menu'];
    $namafile = $_POST["name_menu"];
    $gambar = $_FILES["image_menu"]["name"];
    $nama_menu = $_POST['name_menu'];
    $price_menu = $_POST['price_menu'];

    $x = explode(".", $gambar);
    $extensi = strtolower(end($x));
    $gambar_baru = "$namafile.$extensi";
    $temp = $_FILES["image_menu"]["tmp_name"];

    if (move_uploaded_file($temp, 'img/menu/'. $gambar_baru)){
        $query = mysqli_query($con, "INSERT INTO tb_menu VALUES ($id, '$gambar_baru', '$nama_menu', '$price_menu')");
        if ($query) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan...');
                    document.location.href = 'edit-menu.php';
                </script>
            ";
        } else {
            echo error_log($query);
        }
    }
    else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan...');
                document.location.href = 'edit-menu.php';s
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/update-data.css">
</head>
<body>
    <a href="edit-menu.php" class="back-button">
    <span>Back</span></a>

    <h1>Input Data Menu</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                <p>Id Menu</p>
                <input type="text" name="id_menu" placeholder="Enter ID Menu..." required>
                    <p>Name Menu</p>
                    <input type="text" name="name_menu" placeholder="Enter name..." required>
                    <p>Product Image</p>
                    <input type="file" name="image_menu" accept="image/jpg, image/png, image/webp" required>
                    <p>Price</p>
                    <input type="number" name="price_menu" placeholder="Enter price..." required> <br>
            
                    <button type="submit" name="tambah">TAMBAH</button>
                </form>
</body>
</html>