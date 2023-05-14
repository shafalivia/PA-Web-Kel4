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

$query = "SELECT * FROM karyawan WHERE id_karyawan = '$id'";
$result = mysqli_query($con, $query);

if(!isset($_GET["id"])){
    header("Location: edit-karyawan.php");
    exit;
} else if(mysqli_num_rows($result) == 1){
  // memang dikosongkan
}else{
    header("Location: edit-karyawan.php");
    exit;
}

function ubah($data) {
    global $con;
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $kontak = $_POST['kontak'];
    $username = $_POST['username'];

    $query = "UPDATE karyawan SET
                id_karyawan = '$id',
                nama = '$nama',
                jabatan = '$jabatan',
                kontak = '$kontak',
                username = '$username'
                WHERE id_karyawan = '$id'";
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

if( isset($_POST['update'])) {
    if(ubah($_POST) >0 ){
        echo "<script>
        // document.location.href = 'edit-karyawan.php';
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data telah di update.',
            icon: 'success',
            confirmButtonText: 'OK',
            customClass: {
              confirmButton: 'my-custom-button-class'
            }
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'edit-karyawan.php';
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

<?php 

$sel_query = "SELECT * FROM user WHERE role = 'admin' OR role = 'kasir'";
$result1 = mysqli_query($con, $sel_query);

?>

    <a href="edit-karyawan.php" class="back-button">
        <span>Back</span>
    </a>
    <h1>Update Data</h1>
    <form action="" method="post">
        <?php while( $row = mysqli_fetch_assoc($result)) :?>

            <input type="hidden" name="id" value="<?php echo $row['id_karyawan']?>"> <br>
            Nama Lengkap   <input type="text" name="nama" value="<?php echo $row['nama']?>"> <br>
            Jabatan  <input type="text" name="jabatan" value="<?php echo $row['jabatan']?>"> <br>
            Kontak  <input type="text" name="kontak" value="<?php echo $row['kontak']?>"> <br>
            Username 
            <select name="username">
                <?php while($sel_row1 = mysqli_fetch_array($result1)):; ?>
                <option value=" <?php echo $sel_row1[0]; ?> "> 
                                <?php echo $sel_row1[0]; ?> </option>
                <?php endwhile; ?>
            </select> <br>
                <button type="submit" name="update" class="right">Update</button>

        <?php endwhile ?>
    </form>
</body>
</html>