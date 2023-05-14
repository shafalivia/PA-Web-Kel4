<?php include 'header-user.php'; ?>

<?php 
    session_start();
    $username = $_SESSION['username'];

    if (isset($_POST['new_order'])) {
        $no_transaksi = rand(1111, 5999); 
        $_SESSION['notrak']=$no_transaksi;
        echo "<script>
        document.location.href = '1menu.php';
        </script> ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main-user.css">
    <title>User Gudetama Café</title>
</head>
<body>
    <section class="back">
        <div class="back">
            <!-- <img src="img/home-user/back1.png" alt=""> -->
            <!-- <button class="custom-btn btn-1">Buy Now</button> -->
        </div>
        
    </section>

    <section class="index-img" id='order'>
        <div class="text">
            <h1>Hello <Span><?php echo $_SESSION['username'] ?></Span></Span></h1>
            <h2><span>Egg</span>-citing dishes with a side of Gudetama's charm.</h2>
            <form method="post">
            <button name="new_order" class="custom-btn btn-1" >Make Order</button>
            </form>
        </div>
        <div class="img">
            <img src="img/header-main2/gudetama.png" alt="">
        </div>
    </section>
    <?php include 'menu-user.php'; ?>
</body>
</html>
<?php include 'footer.php'; ?>
