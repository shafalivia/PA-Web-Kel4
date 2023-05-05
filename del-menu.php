<?php

require "db/koneksi.php";

$id = $_GET['id'];

if( $id ){
    $query = "DELETE FROM tb_menu WHERE id_menu = '$id'";
    mysqli_query($con, $query);
    echo "<script>
    alert('Berhasil Hapus data');
    document.location.href = 'edit-menu.php';
    </script> ";
}

?>