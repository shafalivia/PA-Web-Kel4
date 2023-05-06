
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="css/kasir.css">
</head>
<body>
    <div class="container">
            <div class="input">
    Harga :
    <input id='1' type="number" name="harga" required oninput='hitung()'></div>
    <div class="input">
    Jumlah :
    <input id='2' type="number" name="jumlah" required oninput='hitung()'></div>
    <div class="input">
    Total :
    <input id='3' type="text" name="total" disabled></div>
    <input type="submit" value="Print Nota">
    
    <script>
        function hitung(){
            var jumlah=document.getElementById("2").value
            var harga=document.getElementById("1").value
            var total=parseFloat(jumlah)*parseFloat(harga)
            document.getElementById("3").value=total
        }
        form.addEventListener('submit', function(a){
            a.preventDefault()
            alert("Nota sudah jadi")
        })
    </script>

</div>

</body>

</html>


