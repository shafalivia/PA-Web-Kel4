<?php include 'header-user.php'; ?>

<?php 
// Untuk mengambil order dari button
session_start();
require('db/koneksi.php');

if (isset($_POST['order'])) {
    if (null !==('cart')) {
        $session_array = array(
            'id' => $_GET['id_menu'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'jumlah' => $_POST['jumlah']
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

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/1menu.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="con-menu">
    <?php
    // Untuk menampilkan menu
        require('db/koneksi.php');

        $resultMenu = mysqli_query($con, "SELECT * FROM tb_menu");

        $menu = [];

        while($rowMenu= mysqli_fetch_assoc($resultMenu)){?>
            <!-- $menu[] = $rowMenu; -->
            <div class="menu">
                <form method='post' action="1menu.php?id_menu=<?php echo $rowMenu["id_menu"] ?>">
                <div class="menu-card">  
                    <div class="menu-img">
                        <img src=" img\menu\<?php echo $rowMenu['image_menu'] ?>" style="height: 200px;">
                    </div>
                    
                    <div class="menu-text">
                        <h2><?php echo $rowMenu['name_menu'] ?></h2>
                        <h2><?php echo number_format($rowMenu['price_menu']) ?></h2>
                        <input type="number" name="jumlah" value="1" id="">

                        <!-- Untuk mengambil value -->
                        <input type="hidden" name="name" value="<?php echo $rowMenu['name_menu'] ?>">
                        <input type="hidden" name="price" value="<?php echo $rowMenu['price_menu'] ?>"> 
                        
                    </div>
                
            </div>
            <input class="order-btn" type="submit" name="order" value="+Order">
            </form>
            </div>  
        <?php }
        ?>
        </div>

    <div class="con-order">

    <?php 
    $total = 0;
    $output = '';
    $output .= "
    <table>
        <tr>
        <th>ID</th>
        <th>Item Order</th>
        <th>Satuan</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Action</th>
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
                    <td>
                        <a href='1menu.php?action=remove&id=".$value['id']."'>
                        <button>Remove</button>
                        </a>
                    </td>
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
                </tr>
            ";
        }

    echo $output;
    ?>
    </div>

    <?php
    if (isset($_GET['action'])) {

        if($_GET['action'] == 'clearall') {
            unset($_SESSION['cart']);
        }
        if ($_GET['action']=='remove') {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
    
    ?>
</div>
</body>
</html>