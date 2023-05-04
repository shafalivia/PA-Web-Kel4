<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">

<?php 
    session_start();
    require "db/koneksi.php";

    if(isset($_POST['login'])) {
        
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
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
            
            <button type="submit" name="login" class="action-button">Log in</button>
            
            <p class="form__signup">Don't have an Account? <a href="1signup.php">Sign Up</a></p>

        </form>

        </div>
    </div>
 
</body>
   
