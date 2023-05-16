<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background-color: #483114;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      background-color: #FFF9C4;
      color: #483114;
      width: 300px;
      height: 200px;
      transition: transform 0.3s ease;
    }

    .card-body {
      padding: 20px;
    }

    .card-icon {
      font-size: 40px;
      margin-bottom: 10px;
    }

    .card-title {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .card-text {
      font-size: 18px;
    }

    .card:hover {
      transform: scale(1.1);
    }
  </style>
  <title>Dashboard</title>
</head>

<body>
<?php include 'header-admin2.php'; ?>
<section id="dashboard">
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-users card-icon"></i>
            <h5 class="card-title">User Count</h5>
            <?php
                require "db/koneksi.php";
                $query = "SELECT COUNT(*) AS total_user FROM user";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                $totalUser = $row['total_user'];
                ?>
            <p class="card-text">Total number of users: <?php echo $totalUser; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-users card-icon"></i>
            <h5 class="card-title">Employees Count</h5>
            <?php
                require "db/koneksi.php";
                $query = "SELECT COUNT(*) AS total_user FROM karyawan";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                $totalUser = $row['total_user'];
                ?>
            <p class="card-text">Total number of employees: <?php echo $totalUser; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-utensils card-icon"></i>
            <h5 class="card-title">Menu Count</h5>
            <?php
                require "db/koneksi.php";
                $query = "SELECT COUNT(*) AS total_user FROM tb_menu";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                $totalUser = $row['total_user'];
                ?>
            <p class="card-text">Total number of menu items: <?php echo $totalUser; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-chart-line card-icon"></i>
            <h5 class="card-title">Transaction Count</h5>
            <?php
                require "db/koneksi.php";
                $query = "SELECT SUM(harga) AS total_price, COUNT(*) AS total_count FROM transaksi";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                $totalPrice = $row['total_price'];
                $totalCount = $row['total_count'];
                ?>
            <p class="card-text">Total number of transactions: <?php echo $totalCount; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-money-bill-wave card-icon"></i>
            <h5 class="card-title">Transaction Revenue</h5>
            <p class="card-text">Total revenue from transactions: Rp.<?php echo number_format($totalPrice,2); ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <i class="fas fa-clock card-icon"></i>
            <h5 class="card-title">Latest Transaction</h5>
            <?php 
            require "db/koneksi.php";
            $query = "SELECT * FROM transaksi ORDER BY tanggal DESC LIMIT 1";
            $result = mysqli_query($con, $query);
            $latestOrder = mysqli_fetch_assoc($result);
            ?>
            <p class="card-text"><?php echo $latestOrder['tanggal']; ?> 
                                #<?php echo $latestOrder['no_transaksi']; ?> 
                                oleh @<?php echo $latestOrder['username']; ?>, 
                                memesan '<?php echo $latestOrder['pesanan']; ?>'</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
</body>

</html>

           
