<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Gudetama Café</title>
</head>
<body class="my-index">
    <section class="index-img" id="Index">
        <div class="text">
            <h1>Get <Span>egg</Span>-cited!</h1>
            <h2>Come for the <Span>egg</Span>-cellent food,<br> stay for the adorable atmosphere at<br> <span>Gudetama's Café.</span> </h2>
            <button class="custom-btn btn-1" onclick="location.href='1login.php';">
            <p>Buy now</p>
            </button>

        </div>
        <div class="img">
            <img src="img/header-main/gudetama-hero1.png" alt="">
        </div>
    </section>
    <h1 class="title">
    Our menu is so delicious, even <span>Gudetama </span>would be motivated to eat it...eventually.
    </h1>
    <section id="about">
        <?php include 'about.php'; ?>
    </section>
    <?php include 'menu-user.php'; ?>
</body>

</html>
<?php include 'footer.php'; ?>
