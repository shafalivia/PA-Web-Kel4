<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="css/kasir.css">
<title>Kasir Gudetama Café</title>
<html>
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
        .my-icon-class {
          color: #483114 !important;
        }
</style>

<?php
error_reporting(E_ERROR | E_PARSE);
// Start or resume the session
session_start();

// Check if the session variable exists
if (!isset($_SESSION['values'])) {
    // If it doesn't exist, initialize it as an empty array
    $_SESSION['values'] = array();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted value from the form
    $newValue = $_POST['sub_total'];

    // Add the new value to the session array
    $_SESSION['values'][] = $newValue;
}

// Check if the "Empty" button is clicked
if (isset($_POST['save1'])) {
    // Unset the session variable to empty the array
    unset($_SESSION['values']);
    unset($_SESSION['bill']);
}

if (isset($_POST['clear'])) {
    // Unset the session variable to empty the array
    unset($_SESSION['values']);
    unset($_SESSION['bill']);
}

// Calculate the sum of the values in the session array (if it exists)
$sum = isset($_SESSION['values']) ? array_sum($_SESSION['values']) : 0;

// Check if the session variable exists
if (!isset($_SESSION['bill'])) {
    // If it doesn't exist, initialize it as an empty array
    $_SESSION['bill'] = array();
}

if (isset($_POST['save'])) {
    $productName = isset($_POST['name_menu']) ? $_POST['name_menu'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $price = isset($_POST['price_menu']) ? $_POST['price_menu'] : '';

    if ($productName !== '' && $quantity !== '' && $price !== '') {
        $item = array(
            'product_name' => $productName,
            'quantity' => $quantity,
            'price' => $price
        );

        $_SESSION['bill'][] = $item; // Add item to the bill session array
    } else {
        // echo '<script>alert("Menu belum dipilih.");</script>';
        echo "<script>
        Swal.fire({
          title: 'Gagal!',
          text: 'Menu belum dipilih',
          icon: 'warning',
          confirmButtonText: 'OK',
          customClass: {
            confirmButton: 'my-custom-button-class'
          }
        });
      </script>";
    }
}

?>

<a href="index.php" class="back-button" id="logout-link">
<span>Logout</span> </a>
<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault();

    Swal.fire({
        title: 'Log Out',
        text: 'Are you sure you want to log out?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        customClass: {
                    confirmButton: 'my-custom-button-class',
                    cancelButton: 'my-custom-button-class-cancel',
                    icon: 'my-icon-class'
                },
      }).then((result) => {
        if (result.isConfirmed) {
          // Perform the logout action or navigate to the logout page
          window.location.href = 'index.php';
        }
      });
  });
</script>

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

            
        <script>
        function calculateChange() {
            var payment = parseInt(document.getElementById('payment').value);
            var change = payment - <?php echo $sum; ?>;
            if (change >= 0) {
                document.getElementById('change').value = change;
                Swal.fire({
                title: "Payment Successful Rp."  + payment + ".",
                text: "Change: Rp. " + change + "." ,
                icon: "success",
                confirmButtonText: "OK",
                customClass: {
                confirmButton: 'my-custom-button-class'
                }})
            } else {
                document.getElementById('change').value = "";
                Swal.fire({
                title: "Bayar sebesar Rp."  + payment + ".",
                text: "Uang kurang" ,
                icon: "warning",
                confirmButtonText: "OK",
                customClass: {
                confirmButton: 'my-custom-button-class'
                }});
            }
        }

        function printBill() {
            var payment = document.getElementById('payment').value;
            var change = document.getElementById('change').value;

            // Check if the payment input is empty or 0
            if (payment === '' || parseFloat(payment) === 0) {
                // Display an alert to prompt the user to enter a payment amount
                Swal.fire({
                    title: 'Payment Required',
                    text: 'Please enter a valid payment amount.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            } else {
                // Proceed with printing the bill
                var csvContent = "Product Name,Quantity,Price\n";
            
                // Construct the CSV content with product details from the bill session array
                <?php foreach ($_SESSION['bill'] as $item) { ?>
                    var productName = '<?php echo $item['product_name']; ?>';
                    var price = '<?php echo $item['price']; ?>';
                    var quantity = '<?php echo $item['quantity']; ?>';

                    csvContent += productName + "," + quantity + "," + price + "\n";
                <?php } ?>

                // Add payment and change details to the CSV content
                var payment = document.getElementById('payment').value;
                var change = document.getElementById('change').value;
                var date = document.getElementById('tgl_input').value;
                csvContent += "Payment:," + payment + "\n";
                csvContent += "Change:," + change + "\n";
                csvContent += "Tanggal Pembelian:," + date + "\n";

                var csvData = new Blob([csvContent], { type: 'text/csv' });
                var csvUrl = URL.createObjectURL(csvData);

                // Create a temporary link element and click it to trigger the download
                var link = document.createElement('a');
                link.href = csvUrl;
                link.download = 'bill.csv';
                link.click();
                }
            
        }

    </script>
	</body>