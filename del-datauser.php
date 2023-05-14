<?php

require "db/koneksi.php";

$id = $_GET['id'];

if( $id ){
    $query = "DELETE FROM user WHERE username = '$id' AND role = 'user'";
    mysqli_query($con, $query);
    echo "<script>
    document.location.href = 'edit-datauser.php';
    </script> ";
}

?>