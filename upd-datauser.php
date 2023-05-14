<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/update-data.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<link rel="stylesheet" type="text/css" href="sweetalert2.min.css">
    <script src="sweetalert2.min.js"></script>
    <style>
        /* Custom style for SweetAlert */
        .swal2-popup {
            background-color: #FFF9C4; /* Change the background color */
            color: #483114; /* Change the text color */
        }
        .my-custom-button-class {
            background-color: #483114 !important;
            color: #FFF9C4 !important;
        }
        .my-custom-button-class-cancel {
            background-color: #fbb138 !important;
            color: #483114 !important;
        }
</style>

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
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

if( isset($_POST['update'])) {
    if(ubah($_POST) >0 ){
        echo "<script>
        // document.location.href = 'edit-datauser.php';
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data telah di Update.',
            icon: 'success',
            confirmButtonText: 'OK',
            customClass: {
              confirmButton: 'my-custom-button-class'
            }
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'edit-datauser.php';
            }
          });
        </script> ";
    } else{
        echo "<script>
        // alert('Gagal Update data');
        Swal.fire({
            title: 'Gagal!',
            text: 'Data tidak di Update.',
            icon: 'warning',
            confirmButtonText: 'OK',
            customClass: {
              confirmButton: 'my-custom-button-class'
            }
          });
        </script> ";
    }
}

?>

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