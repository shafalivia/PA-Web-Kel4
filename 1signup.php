<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<title>Sign-Up</title>

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
    require "db/koneksi.php";

    if(isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO user VALUES ('$username', '$email', '$password', 'user')";

        mysqli_query($con, $query);
        echo "<script>
        // document.location.href = '1login.php';
        Swal.fire({
            title: 'Berhasil!',
            text: 'Akun telah dibuat. Silahkan Login!',
            icon: 'success',
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
    ?>

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
   

</html>