<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<body class="my-header">
    <header>
    <a href="" class="logo">MANAGE</a>
    <ul>
        <li><a href="accounts.php">Accounts</a></li>
        <li><a href="menu-admin.php">Menu</a></li>
        <li><a href="contact.php">Order</a></li>
        <li><a href="contact.php">Payment</a></li>
    </ul>
    <ul>
        <li><a href="#">Log Out</a></li>
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