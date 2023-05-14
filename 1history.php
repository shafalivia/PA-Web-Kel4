<?php 
session_start();
$username = $_SESSION['username'];
?>

<?php 
    function executeQuery($query){
        require('db/koneksi.php');
        $result = mysqli_query($con, $query);
        return $result;
    }

    // Check if ASC or DESC is clicked or not
    if(isset($_POST['sort'])) {
        $sort_option = $_POST['sort'];
        if($sort_option == 'ASC'){
            $asc_query = "SELECT * FROM transaksi 
                        WHERE username = '$username' 
                        ORDER BY tanggal ASC";
            $result = executeQuery($asc_query);
        }
        elseif ($sort_option == 'DESC') {
            $desc_query = "SELECT * FROM transaksi 
                        WHERE username = '$username' 
                        ORDER BY tanggal DESC";
            $result = executeQuery($desc_query);
        }
    }

    // Check if search button is clicked or not
    elseif (isset ($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $s_query = "SELECT * FROM transaksi 
                WHERE username = '$username' AND CONCAT(pesanan, no_transaksi, tanggal, status)
                LIKE '%".$valueToSearch."%'";
        $result = executeQuery($s_query);
    }

    // Default query
    else {
        $default_query = "SELECT * FROM transaksi 
                        WHERE username = '$username'";
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
    <title>Riwayat Order User</title>
</head>
<body>
    <div class="Cart-Container">

    <?php include 'header-user.php'; ?>
        <form method="post">

            <table border="1">
                <tr> 
                    <th colspan="2">
                    <select name="sort" onchange="this.form.submit()" id="select" class="dropdown">
                        <option value="" disabled selected>Sort Time By v </option>
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                    </th>
                    <th colspan='3'>Pesanan User <Span><?php echo $_SESSION['username'] ?></Span></th>
                    <th colspan="2" class="search-container">
                        <div class="search-wrapper">
                            <input type="text" name="valueToSearch" placeholder="Search pesanan" class="search-input">
                            <button type="submit" name="search" class="search-button"></button>
                        </div>
                    </th>

                </tr>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>No. Transaksi</th>
                    <th>Pesanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>

                <?php 
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td> <?php echo $i ?> </td>
                    <td><?php echo $row['tanggal'] ?></td>
                    <td><?php echo $row['no_transaksi'] ?></td>
                    <td><?php echo $row['pesanan'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                    <td><?php echo $row['jumlah'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                </tr>    
        <?php $i++ ?>
        <?php } ?>

    </table>
    </form>

</body>
</html>
