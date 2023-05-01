<?php
    require('db/koneksi.php');

    $resultMenu = mysqli_query($con, "SELECT * FROM tb_menu");

    $menu = [];

    while($rowMenu= mysqli_fetch_assoc($resultMenu)){
        $menu[] = $rowMenu;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js" crossorigin="anonymous"></script>
    <title>Menuuu</title>
</head>
<body>
    <section id="menu">
    <div class="service-customer">
            <form method="post">
            <p id="service-top"></p>  
            <div class='service-row'>
                <?php foreach ($menu as $tb_menu): ?>
                <div class='service-col'>
                    <div class="service-container">
                        <p class="service-content"><a href="" name="pesan"><img src="img\menu\<?php echo $tb_menu['image_menu'] ?>" class="service-image" loading="lazy"></a></p>
                        <p class="service-sub-title"><b><?php echo $tb_menu['name_menu'] ?></b></p>
                        <p class="price-button">Rp. <?php echo $tb_menu['price_menu'] ?>,-</p>
                        
                        <!-- <input type="number" name="jumlah" value="1" id=""> -->
                        <input type="hidden" name="hidden_name" value="<?php echo $tb_menu["name_menu"]; ?>" />
						<input type="hidden" name="hidden_price" value="<?php echo $tb_menu["price_menu"]; ?>" />
                    </div>
                </div>
                <?php endforeach; ?> 
            <p id="service-bottom"></p>      
            </form>      
        </div>
        </section>
</body>
</html>

<style>
    .service{
    width: 100%;
    margin: auto;
    text-align: center;
    padding-top: 50px;
}
.service-row{
    margin-top: 5%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
}
.service-col{
    padding: 0px 25px;
    margin-bottom: 10%;
}
.service-container{
    background-color: #fff;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    color: #160606;
    padding: 15px;
    border-radius: 5px;
}
.service-content{
    text-align: center;
}
.service-image{
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    border-top-right-radius: 24px;
    border-top-left-radius: 24px;
    height: 280px;
    width: 280px;
}
.service-image:hover{
    transition: 1s;
    transform: scale(1.03);
}
.service-sub-title{
    text-align: center;
    margin-top: 15px;
    color: var(--secondary-color);
}
.price-button {
    background: #FBB138;
    border: 0;
    border-radius: 24px;
    color: white;
    padding: 8px 4px;
    width: 100%;
    margin: 8px 0;
    display: block;
}
.price-button a {
    text-decoration: none;
}
.price-button:hover{
    transition: 0,5s;
    transform: scale(1.03);
}
#service-bottom{
    margin-bottom: 5%;
}

</style>