<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<body>
    <header>
    <a href="" class="logo">GUDETAMA Café</a>
    <ul>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="contact.php">Order</a></li>
        <li><a href="contact.php">History</a></li>
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