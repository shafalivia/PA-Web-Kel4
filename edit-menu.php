

<?php 
    function executeQuery($query){
        require('db/koneksi.php');
        $result = mysqli_query($con, $query);
        return $result;
    }

    // Asc
    if(isset($_POST['ASC'])){
    $asc_query = "SELECT * FROM tb_menu
                ORDER BY id_menu ASC";
    $result = executeQuery($asc_query);
    }

    // Desc
    elseif (isset ($_POST['DESC'])) {
    $desc_query = "SELECT * FROM tb_menu
                ORDER BY id_menu DESC";
    $result = executeQuery($desc_query);
    }

    // Searching
    elseif (isset ($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $s_query = "SELECT * FROM tb_menu 
                WHERE CONCAT(id_menu, nama_menu, harga_menu)
                LIKE '%".$valueToSearch."%'";
        $result = executeQuery($s_query);
        }

    // Default
    else {
        $default_query = "SELECT * FROM tb_menu";
        $result = executeQuery($default_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/edit-menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="Cart-Container">

    <div class="Header">
        <h3 class="Heading">Data Menu</h3>
        <h5 class="Action">Back</h5>
    </div>

    <form method="post">

    <table border="1">
        <tr> 
            <th>
            <input type="submit" name="ASC" value="Ascending">
            </th>
            <th>
            <input type="submit" name="DESC" value="Descending">
            </th>
            <th colspan="4"><a href="new-menu.php">Tambah Menu Baru</a></th>
        </tr>
        <tr>
            <th>No.</th>
            <th>ID Menu</th>
            <th>Gambar</th>
            <th>Nama Menu</th>
            <th>Harga Menu</th>
            <th>Action</th>
        </tr>

        <?php 
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {?>
        <tr>
            <td> <?php echo $i ?> </td>
            <td><?php echo $row['id_menu'] ?></td>
            <td><img src="img/menu/<?= $row['image_menu']?>" height="120px" width="120px"></td>
            <td><?php echo $row['name_menu'] ?></td>
            <td><?php echo $row['price_menu'] ?></td>
            <td><a href="del-menu.php?id=<?php echo $row['id_menu'] ?>">Hapus Data</a></td>

        </tr>    
        <?php $i++ ?>
        <?php } ?>

    </table>
    </form>

</body>
</html>