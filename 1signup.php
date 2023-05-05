<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">

<?php 
    require "db/koneksi.php";

    if(isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO user VALUES ('$username', '$email', '$password', 'user')";

        mysqli_query($con, $query);
        echo "<script>
        alert('Akun anda sudah siap!');
        document.location.href = '1login.php';
        </script> ";
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

            <input autocomplete="email" type="text" name="email" class="form__input" placeholder="E-mail" required>

            <input type="password" name="password" class="form__input" placeholder="Password" required> 

            <button type="submit" name="signup" class="action-button">Sign Up</button>

            <p class="form__signup">Already Have an Account? <a href="1login.php">Log In</a></p>
        </form>

        </div>
    </div>
 
</body>
   
