<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<body class="my-header">
    <header>
    <a href="" class="logo">MANAGE</a>
    <ul>
        <li class="signup"><a href="#">Log Out</a></li>
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