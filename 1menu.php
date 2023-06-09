<?php include 'header-user.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/1menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order User</title>
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
error_reporting(E_ERROR | E_PARSE);
// Untuk mengambil order dari button
session_start();
require('db/koneksi.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date('Y/m/d H:i:s');
$name = $_POST['name'];
$price = $_POST['price'];
$jumlah = $_POST['jumlah'];
$username = $_SESSION['username'];
$notrak = $_SESSION['notrak'];
$status = 'Belum di proses';

if (isset($_POST['order'])) {

    if (null !==('cart')) {
        // Masuk ke database
        $query = "INSERT INTO transaksi VALUES ('$date', $notrak,'$username', '$name', '$price', $jumlah, '$status')";
        mysqli_query($con, $query);
        echo "<script>
        // alert('Pesanan ditambahkan!');;
        Swal.fire({
            title: '+Order!',
            text: 'Pesanan ditambahkan!',
            icon: 'success',
            confirmButtonText: 'OK',
            customClass: {
              confirmButton: 'my-custom-button-class'
            }
          });
        </script> ";

        // Masuk ke Session
        $session_array = array(
            'id' => $_GET['id_menu'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'jumlah' => $_POST['jumlah'],
            'proses' => $status
        );

        $_SESSION['cart'][] = $session_array;
    }else{
        $session_array = array(
            'id' => $_GET['id_menu'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'jumlah' => $_POST['jumlah']
        );

        $_SESSION['cart'][] = $session_array;
    }
}

?>

    <div class="container">
    <div class="con-order">
    
    <h1>Nomor Transaksi #<?php echo $notrak ?></h1>

    <?php 
    $total = 0;
    $output = '';
    $output .= "
    <table>

        <tr> <th colspan='7'>Checkout Order</th> </tr>
        <tr>
        <th>ID</th>
        <th>Item Order</th>
        <th>Satuan</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Action</th>
        <th>Status</th>
        </tr>";

        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {

                $output .= "
                <tr>
                    <td>".$value['id']."</td>
                    <td>".$value['name']."</td>
                    <td>".$value['price']."</td>
                    <td>".$value['jumlah']."</td>
                    <td>".number_format((int)$value['jumlah'] * (int)$value['price'], 2)."</td>
                    <td> </td>
                    <td>".$value['proses']."</td>
                </tr>
                ";

                $total = $total + $value['jumlah'] * $value['price'];
            }

            $output .= "
                <tr>
                <td colspan='3'></td>
                <td>Total</td>
                <td>".number_format($total,2)."</td>
                <td>
                <a href='1menu.php?action=clearall'>
                <button>Clear All</button>
                </a>
                <td> </td>
                </tr>

                <tr>
                <th colspan='7'> 
                <a href='1menu.php?action=pesan'>
                <button>Proses Pesanan</button> </th> 
                </tr>
            ";
        }

        echo $output;
        ?>
        </div>
    <div class="con-menu">
    <?php
    require('db/koneksi.php');
    if ($_GET['action'] == 'clearall') {
        $delete  = "DELETE FROM transaksi WHERE no_transaksi = $notrak";
        mysqli_query($con, $delete);
        unset($_SESSION['cart']);
    }

    if ($_GET['action'] == 'pesan') {
        unset($_SESSION['cart']);
        $update  = "UPDATE transaksi SET status='Pesanan diterima' WHERE no_transaksi = $notrak";
        // echo $update;
        mysqli_query($con, $update);
        echo "<script>
        // alert('Pesanan sedang di proses silahkan ditunggu!');
        // document.location.href = 'main-user.php';
        Swal.fire({
            title: 'Pesanan Dibuat!',
            text: 'Silahkan ditunggu!',
            icon: 'success',
            confirmButtonText: 'OK',
            customClass: {
              confirmButton: 'my-custom-button-class'
            }
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'main-user.php';
            }
          });
        </script> ";
    }

    // if (isset($_GET['action'])) {
    //     // ini cuma buat hapus isi checkout, bukan di database, jadi gk dipake
    //     if ($_GET['action']=='remove') {
    //         foreach ($_SESSION['cart'] as $key => $value) {
    //             if ($value['id'] == $_GET['id']) {
    //                 unset($_SESSION['cart'][$key]);
    //             }
    //         }
    //     }

    // }
    
    ?>
    <?php
        error_reporting(E_ALL ^ E_WARNING); 
    // Untuk menampilkan menu
        require('db/koneksi.php');

        $resultMenu = mysqli_query($con, "SELECT * FROM tb_menu");

        while($rowMenu= mysqli_fetch_assoc($resultMenu)){?>
            <div class="menu">
                <form method='post' action="1menu.php?id_menu=<?php echo $rowMenu["id_menu"] ?>">
                <div class="menu-card">  
                    <div class="menu-img">
                        <img src=" img\menu\<?php echo $rowMenu['image_menu'] ?>" ">
                    </div>
                    
                    <div class="menu-text">
                        <h2><?php echo $rowMenu['name_menu'] ?></h2>
                        <h2><?php echo number_format($rowMenu['price_menu']) ?></h2>
                        <input type="number" name="jumlah" value="1" id="">

                        <!-- Untuk mengambil value -->
                        <input type="hidden" name="name" value="<?php echo $rowMenu['name_menu'] ?>">
                        <input type="hidden" name="price" value="<?php echo $rowMenu['price_menu'] ?>"> 
                        
                    </div>
                <input class="order-btn" type="submit" name="order" value="+Order" id="inputnum">
            </div>
            </form>
            </div>  
        <?php }
        ?>
    </div>
    </div>
</body>
</html>

