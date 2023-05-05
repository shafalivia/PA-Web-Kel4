<?php 
    function executeQuery($query){
        require('db/koneksi.php');
        $result = mysqli_query($con, $query);
        return $result;
    }

    // Asc
    if(isset($_POST['ASC'])){
    $asc_query = "SELECT * FROM user
                WHERE role = 'user' 
                ORDER BY username ASC";
    $result = executeQuery($asc_query);
    }

    // Desc
    elseif (isset ($_POST['DESC'])) {
    $desc_query = "SELECT * FROM user
                WHERE role = 'user'  
                ORDER BY username DESC";
    $result = executeQuery($desc_query);
    }

    // Searching
    elseif (isset ($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $s_query = "SELECT * FROM user 
                WHERE role = 'user' AND CONCAT(username, email, password)
                LIKE '%".$valueToSearch."%'";
        $result = executeQuery($s_query);
        }

    // Default
    else {
        $default_query = "SELECT * FROM user WHERE role = 'user'";
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
        <h3 class="Heading">Data User Buyer</h3>
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
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>

        <?php 
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {?>
        <tr>
            <td> <?php echo $i ?> </td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><a href="del-datauser.php?id=<?php echo $row['username'] ?>">Hapus Data</a> <br>
            <a href="upd-datauser.php?id=<?php echo $row['username'] ?>">Update Data</a>
            </td>

        </tr>    
        <?php $i++ ?>
        <?php } ?>

    </table>
    </form>

</body>
</html>