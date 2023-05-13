<?php

require "db/koneksi.php";
$id = $_GET['id'];

$query = "SELECT * FROM user WHERE username = '$id' AND role = 'user'";
$result = mysqli_query($con, $query);

if(!isset($_GET["id"])){
    header("Location: edit-datauser.php");
    exit;
} else if(mysqli_num_rows($result) == 1){
  // memang dikosongkan
}else{
    header("Location: edit-datauser.php");
    exit;
}

function ubah($data) {
    global $con;
    $id = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "UPDATE user SET
                email = '$email',
                password = '$pass'
                WHERE username = '$id' AND role = 'user'";
    echo $query;
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

if( isset($_POST['update'])) {
    if(ubah($_POST) >0 ){

        echo "<script>
        alert('Berhasil Update data');
        document.location.href = 'edit-datauser.php';
        </script> ";
    } else{
        echo "<script>
        alert('Gagal Update data');
        </script> ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/update-data.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<a href="edit-karyawan.php" class="back-button">
        <span>Back</span>
    </a>3
    <h1>Update Data</h1>
    <form action="" method="post">
        <?php while( $row = mysqli_fetch_assoc($result)) :?>

            <input type="hidden" name="username" value="<?php echo $row['username']?>">

            Email Baru :
            <input type="text" name="email" value="<?php echo $row['email']?>"> <br>

            Password Baru :
            <input type="text" name="pass" value="<?php echo $row['password']?>"> <br>

            <button type="submit" name="update">Update</button>
        <?php endwhile ?>
    </form>
</body>
</html>