<?php include 'header-user.php'; ?>

<?php 
    session_start();
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main-user.css">
    <title>Main</title>
</head>
<body>
    <section class="back">
        <div class="back">
            <img src="img/home-user/back1.png" alt="">
        </div>
    </section>

    <section class="index-img">
        <div class="text">
            <h1>Hello <Span>Y/N</Span></h1>
            <h2><span>Egg</span>-citing dishes with a side of Gudetama's charm.</h2>
            <button class="custom-btn btn-1">Buy Now</button>
        </div>
        <div class="img">
            <img src="img/header-main2/gudetama.png" alt="">
        </div>
    </section>

</body>
</html>
<?php include 'footer.php'; ?>
