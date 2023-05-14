

<?php 
    function executeQuery($query){
        require('db/koneksi.php');
        $result = mysqli_query($con, $query);
        return $result;
    }

    // Asc
    if(isset($_POST['ASC'])){
    $asc_query = "SELECT * FROM karyawan
                ORDER BY id_karyawan ASC";
    $result = executeQuery($asc_query);
    }

    // Desc
    elseif (isset ($_POST['DESC'])) {
    $desc_query = "SELECT * FROM karyawan
                ORDER BY id_karyawan DESC";
    $result = executeQuery($desc_query);
    }

    // Searching
    elseif (isset ($_POST['search'])) {
        $valueToSearch = $_POST['valueToSearch'];
        $s_query = "SELECT * FROM karyawan 
                WHERE CONCAT(id_karyawan, nama, jabatan, role, username, kontak)
                LIKE '%".$valueToSearch."%'";
        $result = executeQuery($s_query);
        }

    // Default
    else {
        $default_query = "SELECT * FROM karyawan";
        $result = executeQuery($default_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/edit-history.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Edit Data Karyawan</title>
</head>
<body>
    <div class="Cart-Container">
    
    <?php include 'header-admin2.php'; ?>

    <form method="post">

    <table border="1">
        <tr> 
            <th>
            <input type="submit" name="ASC" value="Ascending">
            </th>
            <th>
            <input type="submit" name="DESC" value="Descending">
            </th>
            <th colspan="6"><a href="new-karyawan.php"><span>Tambah Data Baru</span></a></th>
        </tr>
        <tr>
            <th>No.</th>
            <th>ID Karyawan</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Kontak</th>
            <th>Role</th>
            <th>Username</th>
            <th>Action</th>
        </tr>

        <?php 
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {?>
        <tr>
            <td> <?php echo $i ?> </td>
            <td><?php echo $row['id_karyawan'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['jabatan'] ?></td>
            <td><?php echo $row['kontak'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td>
                <a href="del-karyawan.php?id=<?php echo $row['id_karyawan'] ?>" class="delete-link">Hapus Data</a> <br>
                <a href="upd-karyawan.php?id=<?php echo $row['id_karyawan'] ?>">Update Data</a>
            </td>

        </tr>    
        <?php $i++ ?>
        <?php } ?>

    </table>
    </form>

<script>
  // Attach click event listener to the delete link
  const deleteLinks = document.querySelectorAll('.delete-link');
  deleteLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault();

      // Display the SweetAlert pop-up
      Swal.fire({
        title: 'Delete Data',
        text: 'Are you sure you want to delete this data?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        customClass: {
                    confirmButton: 'my-custom-button-class',
                    cancelButton: 'my-custom-button-class-cancel'
                },
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect to the delete page with the provided ID
          window.location.href = this.getAttribute('href');
        }
      });
    });
  });
</script>

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
</body>
</html>