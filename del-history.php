<?php

require "db/koneksi.php";

$id = $_GET['id'];

if( $id ){
    $query = "DELETE FROM transaksi WHERE tanggal= '$id'";
    mysqli_query($con, $query);
    echo "<script>
    document.location.href = 'edit-history.php';
    </script> ";
}

?>