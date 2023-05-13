
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="css/kasir.css">
</head>
<body>
<div class="container">
			<div class="card">
				<h2>Kasir</h2>
                <form method="post" id="form-menu">

                <!-- Tanggal -->
                    <label class=""><b>Tgl. Transaksi</b></label>
                    <input type="text" class="" name="tgl_input" id="tgl_input" value="<?php echo  date("j F Y");?>" readonly>
                    <br>

                <!-- Pilih Menu -->
                    <label class=""><b>Menu</b></label>

                    <select name="menu" oninput="document.getElementById('form-menu').submit()">
                        <option value="">Pilih Menu</option>
                        <?php 
                        require "db/koneksi.php";
                        $query = "SELECT * FROM tb_menu";
                        $result = mysqli_query($con, $query);
                        while($row = mysqli_fetch_array($result)) {
                            ?>
                            <option> <?php echo $row['name_menu']; ?> </option>
                        <?php
                        }
                        ?>
                    </select> <br>

                <!-- Detail Pesanan Menu -->
                        <?php 
                            $nama = $_POST['menu'];
                            $query = "SELECT * FROM tb_menu WHERE name_menu = '$nama'";
                            $result = mysqli_query($con, $query);
                            while($row = mysqli_fetch_array($result)) {
                                ?>
                            <!-- Nama Menu -->
                                <label class=""><b>Nama Menu</b></label>
                                <input type="text" class="" name="name_menu" id="name_menu" readonly required
                                value="<?php echo $nama; ?>"> <br>
                        
                            <!-- Id Menu -->
                                <label class=""><b>Id Menu</b></label>
                                <input type="text" class="" name="id_menu" id="id_menu" readonly required
                                    value=" <?php echo $row['id_menu']; ?>"> 
                                <br>
                                
                            <!-- Harga Menu -->
                                <label class=""><b>Harga Menu</b></label>
                                <input type="number" class="" name="price_menu" id="price_menu" readonly required oninput='hitung()'
                                value="<?php echo $row['price_menu']; ?>"> 
                            <?php
                            }
                            ?>
                        <br>

                        <!-- Kuantitas -->
                        <label class=""><b>Jumlah</b></label>
                        <input type="number" class="" id="quantity" name="quantity" placeholder="0" required oninput='hitung()'>
                        <br>

                        <!-- Total -->
                        <label class=""><b>Sub-Total</b></label>
                        <input type="text" class="subtotal"  id="subtotal" name="sub_total" readonly>
                        
                        <!-- Button Tambah -->
                        <button class="" name="save" type="submit"> Tambah </button>
                    </form>
			</div>

        <script>
            function hitung(){
                var jumlah=document.getElementById("quantity").value
                var harga=document.getElementById("price_menu").value
                var total=parseFloat(jumlah)*parseFloat(harga)
                document.getElementById("subtotal").value=total
            }
        </script>


			<div class="card">
				<h2>Pembayaran</h2>
                <?php 
                // Display the bill
                echo '<table>';
                echo '<tr><th>Product Name</th><th>Quantity</th><th>Price</th></tr>';
                foreach ($_SESSION['bill'] as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['product_name'] . '</td>';
                    echo '<td>' . $item['quantity'] . '</td>';
                    echo '<td>' . $item['price'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                ?>

                <p>Total Belanja Rp. <span><?php echo $sum;?></span> </p>
                <form action="" method="post">
                <button name="clear" type="submit">Clear Data</button>
                </form>

                <form method="POST">

                <label for="payment"><b>Bayar</b></label>
                <input type="number" name="payment" id="payment" required onchange="calculateChange()">

                <label for="change"><b>Kembali</b></label>
                <input type="number" name="change" id="change" readonly>

                <button name="save1" value="" type="submit" onclick="calculateChange()">Bayar</button>
                <button name="print" value="" type="button" onclick="printBill()">Print</button>

         
                </form>

			</div>

</body>

</html>


