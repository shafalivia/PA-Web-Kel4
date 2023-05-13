<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">

<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body class="align">
<?php 
    error_reporting(E_ALL ^ E_WARNING); 
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
            alert('Berhasil! Selamat datang " . $_SESSION["username"] . ".');
            document.location.href = 'main-user.php';
            </script> ";

        }else{
            echo "<script>
            alert('gagal');
            document.location.href = '1login.php';
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
            alert('Berhasil! Selamat datang Admin " . $_SESSION["username"] . ".');
            document.location.href = 'main-admin.php';
            </script> ";

        }else{
            echo "<script>
            alert('gagal');
            document.location.href = '1login.php';
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
            alert('Berhasil! Selamat datang Kasir " . $_SESSION["username"] . ".');
            document.location.href = 'kasir.php';
            </script> ";

        }else{
            echo "<script>
            alert('gagal');
            document.location.href = '1login.php';
            </script> ";
            exit;
        }
    }

    elseif($role == null) {
        echo "<script>
            alert('Gagal! Masukkan role anda');
            document.location.href = '1login.php';
            </script> ";
    }

}
    ?>

<body class="align">
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