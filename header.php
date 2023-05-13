<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<body class="my-header">
    <header class="header-head">
    <a href="" class="logo">GUDETAMA Café</a>
    <ul>
    <li><a href="#about">About</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="signup"><a href="1login.php">Log In</a></li>
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