<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="my-header">

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

    <header>
    <a href="main-user.php" class="logo">GUDETAMA Café</a>
    <ul>
        <li><a href="main-user.php">Home</a></li>
        <li><a href="1history.php">History</a></li>
        <li class="signup"><a href="index.php" onclick="showLogoutPopup(event)">Log Out</a></li>
    </ul>
  </header>

  <script type="text/javascript">
    window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })

    function showLogoutPopup(event) {
      event.preventDefault(); // Prevent the default navigation behavior

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
}

  </script>
</body>
</html>