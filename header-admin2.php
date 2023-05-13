<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<body class="my-header">
    <header>
    <a href="main-admin.php" class="logo">Manage</a>
    <ul>
      <li><a href="edit-menu.php">Menu</a></li>
      <li><a href="edit-history.php">History</a></li>
      <li><a href="edit-datauser.php">Data User</a></li>
      <li><a href="edit-karyawan.php">Karyawan</a></li>
      <li class="signup"><a href="index.php">Log Out</a></li>
    </ul>
  </header>
  <script type="text/javascript">
    window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })
  </script>
</body>
</html>