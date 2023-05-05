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
    echo $query;
    mysqli_query($con, $query);
    return mysqli_affected_rows($con);
}

if( isset($_POST['update'])) {
    if(ubah($_POST) >0 ){

        echo "<script>
        alert('Berhasil Update data');
        document.location.href = 'edit-karyawan.php';
        </script> ";
    } else{
        echo "<script>
        alert('Gagal Update data');
        </script> ";
    }
}

?>

<?php 

$sel_query = "SELECT * FROM user WHERE role = 'admin' OR role = 'kasir'";
$result1 = mysqli_query($con, $sel_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Update Data</h1>
    <form action="" method="post">
        <?php while( $row = mysqli_fetch_assoc($result)) :?>

            <input type="hidden" name="id" value="<?php echo $row['id_karyawan']?>"> <br>
            Nama Lengkap  : <input type="text" name="nama" value="<?php echo $row['nama']?>"> <br>
            Jabatan : <input type="text" name="jabatan" value="<?php echo $row['jabatan']?>"> <br>
            Kontak : <input type="text" name="kontak" value="<?php echo $row['kontak']?>"> <br>
            Username : 
            <select name="username">
                <?php while($sel_row1 = mysqli_fetch_array($result1)):; ?>
                <option value=" <?php echo $sel_row1[0]; ?> "> 
                                <?php echo $sel_row1[0]; ?> </option>
                <?php endwhile; ?>
            </select> <br>
            
            <button type="submit" name="update">Update</button>
        <?php endwhile ?>
    </form>
</body>
</html>