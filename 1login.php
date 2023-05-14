<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">

<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>Login</title>
<body class="align">

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
    session_start();
    require "db/koneksi.php";

    if(isset($_POST['login'])) {
        
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['type'];

    if($role == 'Buyer') {
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND role='user'";
        $result = mysqli_query($con, $query);
        $_SESSION['username']=$username;

        if(mysqli_num_rows($result) == 1){
            echo "<script>
            // alert('Berhasil! Selamat datang " . $_SESSION["username"] . ".');
            
            // document.location.href = 'main-user.php';

            Swal.fire({
                title: 'Berhasil Login!',
                text: 'Selamat datang " . $_SESSION["username"] . ".',
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Next',
                cancelButtonText: 'Back',
                customClass: {
                    confirmButton: 'my-custom-button-class',
                    cancelButton: 'my-custom-button-class-cancel'
                },
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = 'main-user.php';  
                } else {
                  document.location.href = '1login.php';
                }
              });
            
            </script> ";

        }else{
            echo "<script>
            // alert('gagal');
            // document.location.href = '1login.php';
            Swal.fire({
                title: 'Gagal!',
                text: 'Akun tidak ada.',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                  confirmButton: 'my-custom-button-class'
                }
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = '1login.php';
                }
              });
            </script> ";
            exit;
        }
    }

    elseif($role == 'Admin') {
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND role='admin'";
        $result = mysqli_query($con, $query);
        $_SESSION['username']=$username;

        if(mysqli_num_rows($result) == 1){
            echo "<script>
            // alert('Berhasil! Selamat datang Admin " . $_SESSION["username"] . ".');
            // document.location.href = 'main-admin.php';

            Swal.fire({
                title: 'Berhasil Login Admin!',
                text: 'Selamat datang " . $_SESSION["username"] . ".',
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Next',
                cancelButtonText: 'Back',
                customClass: {
                    confirmButton: 'my-custom-button-class',
                    cancelButton: 'my-custom-button-class-cancel'
                },
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = 'main-admin.php';  
                } else {
                  document.location.href = '1login.php';
                }
              });
            </script> ";

        }else{
            echo "<script>
            // alert('gagal');
            // document.location.href = '1login.php';
            Swal.fire({
                title: 'Gagal!',
                text: 'Akun tidak ada.',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                  confirmButton: 'my-custom-button-class'
                }
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = '1login.php';
                }
              });
            </script> ";
            exit;
        }
    }

    elseif($role == 'Kasir') {
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password' AND role='kasir'";
        $result = mysqli_query($con, $query);
        $_SESSION['username']=$username;

        if(mysqli_num_rows($result) == 1){
            echo "<script>
            // alert('Berhasil! Selamat datang Kasir " . $_SESSION["username"] . ".');
            // document.location.href = 'kasir.php';

            Swal.fire({
                title: 'Berhasil Login Kasir!',
                text: 'Selamat datang " . $_SESSION["username"] . ".',
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Next',
                cancelButtonText: 'Back',
                customClass: {
                    confirmButton: 'my-custom-button-class',
                    cancelButton: 'my-custom-button-class-cancel'
                },
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = 'kasir.php';  
                } else {
                  document.location.href = '1login.php';
                }
              });
            
            </script> ";

        }else{
            echo "<script>
            // alert('gagal');
            // document.location.href = '1login.php';
            Swal.fire({
                title: 'Gagal!',
                text: 'Akun tidak ada.',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                  confirmButton: 'my-custom-button-class'
                }
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = '1login.php';
                }
              });
            </script> ";
            exit;
        }
    }

    elseif($role == null) {
        echo "<script>
            // alert('Gagal! Masukkan role anda');
            // document.location.href = '1login.php';
            Swal.fire({
                title: 'Gagal!',
                text: 'Masukkan role anda',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                  confirmButton: 'my-custom-button-class'
                }
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = '1login.php';
                }
              });
            </script> ";
    }

}
    ?>
    <a href="index.php" class="back-button">
        <span>Back</span>
    </a>
    <div class="circle">
        <div class="grid">
        <form class="form login" method="post">

            <input autocomplete="username" type="text" name="username" class="form__input" placeholder="Username" required>
            
            <input type="password" name="password" class="form__input" placeholder="Password" required> 
            <div class="input-opt " type="text" name="username">
                <select name="type" id="select">
                    <option value="" disabled selected>Choose a role</option>
                    <option value="Buyer">Buyer</option>
                    <option value="Admin">Admin</option>
                    <option value="Kasir">Kasir</option>
                </select>
            </div>
            <button type="submit" name="login" class="action-button">Log in</button>
            
            <p class="form__signup">Don't have an Account? <a href="1signup.php">Sign Up</a></p>

        </form>

        </div>
    </div>
 
</body>
</html>
