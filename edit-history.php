<?php 
    function executeQuery($query){
        require('db/koneksi.php');
        $result = mysqli_query($con, $query);
        return $result;
    }

    // Asc
    if(isset($_POST['ASC'])){
    $asc_query = "SELECT * FROM transaksi 
                ORDER BY tanggal ASC";
    $result = executeQuery($asc_query);
    }

    // Desc
    elseif (isset ($_POST['DESC'])) {
    $desc_query = "SELECT * FROM transaksi 
                ORDER BY tanggal DESC";
    $result = executeQuery($desc_query);
    }

    // Searching
    elseif (isset ($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $s_query = "SELECT * FROM transaksi 
                WHERE CONCAT(pesanan, no_transaksi, tanggal, status)
                LIKE '%".$valueToSearch."%'";
        $result = executeQuery($s_query);
        }

    // Default
    else {
        $default_query = "SELECT * FROM transaksi ";
        $result = executeQuery($default_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/history.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="Cart-Container">

    <div class="Header">
        <h3 class="Heading">Riwayat Pesanan</h3>
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
            <th colspan="2">
            <input type="text" name="valueToSearch" placeholder="Value To Search">
            <input type="submit" name="search" value="Cari">
            </th>
        </tr>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Username</th>
            <th>No. Transaksi</th>
            <th>Pesanan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php 
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {?>
        <tr>
            <td> <?php echo $i ?> </td>
            <td><?php echo $row['tanggal'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['no_transaksi'] ?></td>
            <td><?php echo $row['pesanan'] ?></td>
            <td><?php echo $row['harga'] ?></td>
            <td><?php echo $row['jumlah'] ?></td>
            <td><?php echo $row['status'] ?></td>
            <td><a href="del-history.php?id=<?php echo $row['tanggal'] ?>">Hapus Data</a></td>
        </tr>    
        <?php $i++ ?>
        <?php } ?>

    </table>
    </form>

</body>
</html>