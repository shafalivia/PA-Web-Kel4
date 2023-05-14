<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="css/update-data.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Tambah Karyawan</title>
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

if(isset($_GET['tambah']) ) {
    $id = $_GET['id'];
    $nama = $_GET['nama'];
    $jabatan = $_GET['jabatan'];
    $kontak = $_GET['kontak'];
    $role = $_GET['role'];
    $username = $_GET['username'];

    $query = "INSERT INTO karyawan VALUES
    ('$id', '$nama', '$jabatan', '$kontak', '$role', '$username')";

    // echo $query;
    mysqli_query($con, $query);
    echo "<script>
    // document.location.href = 'edit-karyawan.php';
    Swal.fire({
        title: 'Berhasil!',
        text: 'Data telah di Tambahkan.',
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
}
?>

<?php 

$sel_query = "SELECT * FROM user WHERE role = 'admin' OR role = 'kasir'";
$result1 = mysqli_query($con, $sel_query);

?>

    <a href="edit-karyawan.php" class="back-button">
    <span>Back</span></a>

    <h1>Tambah Data</h1>
    <form action="" method="get">

    Id Karyawan : <input type="text" name="id"> <br>
    Nama Lengkap : <input type="text" name="nama"> <br>
    Jabatan : <input type="text" name="jabatan"> <br>
    Kontak : <input type="text" name="kontak"> <br>
    Role : <input type="radio" name="role" value="admin"> admin
            <input type="radio" name="role" value="kasir"> kasir<br>
    Username : 
    <select name="username">
        <?php while($sel_row1 = mysqli_fetch_array($result1)):; ?>
        <option value=" <?php echo $sel_row1[0]; ?> "> 
                        <?php echo $sel_row1[0]; ?> </option>
        <?php endwhile; ?>
    </select> <br>
    <button type="submit" name="tambah">TAMBAH</button>
    </form>
</body>
</html>