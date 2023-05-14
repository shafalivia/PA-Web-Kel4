<?php

require "db/koneksi.php";

$id = $_GET['id'];

if( $id ){
    $query = "DELETE FROM karyawan WHERE id_karyawan = '$id'";
    mysqli_query($con, $query);
    echo "<script>
    document.location.href = 'edit-karyawan.php';
    </script> ";
}

?>